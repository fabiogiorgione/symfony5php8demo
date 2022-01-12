include .env
export
build: ## Build Docker containers
	 docker-compose build

start: ## Start Docker containers
	docker-compose up

stop: ## Stop Docker containers
	docker-compose down

stop-with-volumes: ## Stop Docker containers and removes volumes
	docker-compose down --remove-orphans --volumes

dependencies: ## Run Composer install
	docker-compose run --rm php-fpm composer install

migrations-dev: ## Run DB migrations in dev environment
	docker-compose run --rm php-fpm bin/console doctrine:migrations:migrate --env=dev --no-interaction

clear-cache: ## Clear cache in dev environment
	docker-compose run --rm php-fpm bin/console cache:clear --env=dev

shell: ## Bash into the container
	docker-compose run --rm php-fpm bash
