#!/bin/bash
# makes sure the folder containing the script will be the root folder
cd "$(dirname "$0")" || exit

export HOST_USER_ID=$(id -u)
export HOST_GROUP_ID=$(id -g)

APP_NAME=""
# inspired from maven phases (https://maven.apache.org/guides/introduction/introduction-to-the-lifecycle.html)
PHASE=""

for arg in "$@"; do
    case $arg in
    --app-name=*)
        APP_NAME="${arg#*=}"
        shift
        ;;
    --phase=*)
        PHASE="${arg#*=}"
        shift
        ;;
    esac
done

if [ -z "$APP_NAME" ]; then
    echo "Please provide the app name"
    exit 1
fi

if [ -z "$PHASE" ]; then
    echo "Please provide the phase"
    exit 1
fi

ENV_FILE="../../configuration/env/.${APP_NAME}.compose.env"
COMPOSE_FILE_DEV="./base.wordpress.docker-compose.yml"
COMPOSE_FILE_PROD=""

source ${ENV_FILE}

DATABASE_BACKUP_DIR="../../../database/backup"

function list() {
    echo "[ 📜 🐳 --- compose list ]"
    docker compose --env-file ${ENV_FILE} --file ${COMPOSE_FILE_DEV} ps
}

function up() {
    echo "[ 🟢 🐳 --- compose up ]"
    docker compose --env-file ${ENV_FILE} --file ${COMPOSE_FILE_DEV} up --detach --build
    list
    restore-db
    clean-install
}

function down() {
    echo "[ 🛑 🐳 --- compose down ]"
    backup-db
    docker compose --env-file ${ENV_FILE} --file ${COMPOSE_FILE_DEV} down
    list
}

function down-clean() {
    echo "[ 🛑 🐳 --- compose down clean ]"
    backup-db
    docker compose --env-file ${ENV_FILE} --file ${COMPOSE_FILE_DEV} down --volumes --rmi all
    list
}

function logs() {
    echo "[ 📜 🐳 --- compose logs ]"
    docker compose --env-file ${ENV_FILE} --file ${COMPOSE_FILE_DEV} logs --follow
}

function save-backup-file() {
    echo "[ 📦 🐳 --- save backup file ]"
    if [ -f "${DATABASE_BACKUP_DIR}/${APP_NAME}.sql" ]; then
        cp ${DATABASE_BACKUP_DIR}/${APP_NAME}.sql ${DATABASE_BACKUP_DIR}/${APP_NAME}.$(date +%Y%m%d%H%M%S).sql
    fi
}

function backup-db() {
    echo "[ 📦 🐳 --- backup db ]"
    save-backup-file
    mkdir -p ${DATABASE_BACKUP_DIR}/
    docker exec -it ${APP_NAME}_database mariadb-dump -u${DATABASE_USER} -p${DATABASE_PASSWORD} ${COMPOSE_PROJECT_NAME} >${DATABASE_BACKUP_DIR}/${APP_NAME}.sql
}

function restore-db() {
    echo "[ 📦 🐳 --- restore db ]"
    # check if database service is available if not retry 3 times with 5 seconds interval
    local SLEEP_INTERVAL=5
    for i in {1..3}; do
        SLEEP_INTERVAL=$((SLEEP_INTERVAL * i))
        echo "[ ℹ️  info ] ⏳  Checking if database service is available"
        docker exec -i ${APP_NAME}_database mariadb -u${DATABASE_USER} -p${DATABASE_PASSWORD} ${COMPOSE_PROJECT_NAME} -e "SELECT 1" && break
        echo "[ ⏳ info ] Waiting for database to be available - $SLEEP_INTERVAL seconds"
        sleep $SLEEP_INTERVAL
    done

    if [ -f "${DATABASE_BACKUP_DIR}/${APP_NAME}.sql" ]; then
        echo "[ ℹ️  info ] Restoring database from backup"
        docker exec -i ${APP_NAME}_database mariadb -u${DATABASE_USER} -p${DATABASE_PASSWORD} ${COMPOSE_PROJECT_NAME} <${DATABASE_BACKUP_DIR}/${APP_NAME}.sql
        echo " [ ✅ success ] Database restored"
    else
        echo "[ ❌ error ] No backup file found"
    fi
}

function uninstall-default-plugins() {
    echo "[ 🧹 🐳 --- uninstall plugins ]"
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin deactivate --all --allow-root
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin uninstall --all --allow-root

    # example with specific plugins
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin delete hello --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin delete akismet --allow-root
}

function install-core-plugins() {
    echo "[ 🧹 🐳 --- install plugins ]"
    # use akismet only for non profit websites
    # commented because it causes issues with the PHP version
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install edit-author-slug --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install stop-spammer-registrations-plugin --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install updraftplus --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install social-pug --activate --allow-root
    # commented because it causes issues with the PHP version
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install auto-terms-of-service-and-privacy-policy --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install wpforms-lite --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install wordpress-seo --activate --allow-root
    # commented because it causes issues with the PHP version
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install pretty-link --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install wordpress-importer --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install coming-soon --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install all-in-one-wp-security-and-firewall --activate --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin install aios-firewall-loader --activate --allow-root
}

function list-installed-plugins() {
    echo "[ 🧹 🐳 --- list installed plugins ]"
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp plugin list --allow-root
}

function uninstall-default-themes() {
    echo "[ 🧹 🐳 --- uninstall themes ]"
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme delete twentytwenty --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme delete twentytwentytwo --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme delete twentytwentythree --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme delete twentytwentyfour --allow-root
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme delete twentytwentyfive --allow-root
}

function install-core-themes() {
    echo "[ 🧹 🐳 --- install theme ]"
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme install twentytwentyfive --activate --allow-root
    # free themes from https://wordpress.org/themes/author/automattic/
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme install mymenu --allow-root
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme install coachben --allow-root
    # docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp theme install streamer --allow-root
}

function clean-install() {
    local SLEEP_INTERVAL=5
    for i in {1..3}; do
        SLEEP_INTERVAL=$((SLEEP_INTERVAL * i))
        echo "[ ℹ️  info ] ⏳  Checking if wordpress service is available"
        docker exec ${COMPOSE_PROJECT_NAME}_wordpress wp core is-installed --allow-root && break
        echo "[ ⏳ info ] Wainting for wordpress to be installed - $SLEEP_INTERVAL seconds"
        sleep $SLEEP_INTERVAL
    done

    uninstall-default-plugins
    uninstall-default-themes
    install-core-themes
    install-core-plugins

    # using wp to install themes and plugins makes /var/www/html/wp-content owned by root so we need to change it back to www-data
    docker exec ${COMPOSE_PROJECT_NAME}_wordpress chown -R www-data:www-data /var/www/html/wp-content
}

function help() {
    echo "Available commands:"
    echo "  list: list the containers"
    echo "  up: start the containers"
    echo "  down: stop the containers"
    echo "  down-clean: stop the containers and remove the volumes and images"
    echo "  logs: show the logs"
}

$PHASE && echo "[ ✅ ] --- done" || echo "[ 🚫 ]Failed"
