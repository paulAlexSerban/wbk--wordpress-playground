INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR := ./infrastructure/orchestration/docker

compose-up:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=up --app-name=wp-fullsite-editing

compose-down:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down --app-name=wp-fullsite-editing

compose-down-clean:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down-clean --app-name=wp-fullsite-editing

backup-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=backup-db --app-name=wp-fullsite-editing

restore-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=restore-db --app-name=wp-fullsite-editing

clean-install:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=clean-install --app-name=wp-fullsite-editing

list-installed-plugins:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=list-installed-plugins --app-name=wp-fullsite-editing