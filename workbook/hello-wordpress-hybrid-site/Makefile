INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR := ./infrastructure/orchestration/docker

hello-wordpress-hybrid-site-compose-up:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=up --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-compose-down:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-compose-down-clean:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down-clean --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-backup-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=backup-db --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-restore-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=restore-db --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-clean-install:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=clean-install --app-name=hello-wordpress-hybrid-site

hello-wordpress-hybrid-site-list-installed-plugins:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=list-installed-plugins --app-name=hello-wordpress-hybrid-site