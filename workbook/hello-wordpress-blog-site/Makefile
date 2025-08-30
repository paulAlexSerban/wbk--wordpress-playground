INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR := ./infrastructure/orchestration/docker

compose-up:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=up --app-name=hello-wordpress-blog-site

compose-down:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down --app-name=hello-wordpress-blog-site

compose-down-clean:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=down-clean --app-name=hello-wordpress-blog-site

backup-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=backup-db --app-name=hello-wordpress-blog-site

restore-db:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=restore-db --app-name=hello-wordpress-blog-site

clean-install:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=clean-install --app-name=hello-wordpress-blog-site

list-installed-plugins:
	@bash $(INFRA_ORCHESTRATION_SCRIPTS_DOCKER_DIR)/base.wordpress.docker-compose.bash --phase=list-installed-plugins --app-name=hello-wordpress-blog-site