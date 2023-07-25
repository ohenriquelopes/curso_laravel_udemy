include .env
export
init:
	cp .env .env
	cp docker-compose.yml docker-compose.yml
	docker-compose up -d
	make composer
	make migrate
	make seed
	@docker exec laravel_curso chmod 777 -R .
deploy:
	git pull
	cp .env .env
	cp docker-compose.yml docker-compose.yml
	vendor/bin/sail up -d
	make composer
	make migrate
down:
	vendor/bin/sail down
deploy-stagging:
	git pull
	cp .env
	docker-compose up -d app
	make composer
	make migrate
make-controller:
	@docker exec -i laravel_curso php artisan make:controller
	make permission
make-model:
	@docker exec -i laravel_curso php artisan make:model
	make permission
make-migration:
	@docker exec -i laravel_curso php artisan make:migration
	make permission
make-seed:
	@docker exec -i laravel_curso php artisan make:seeder
	make permission
mix-dev:
	@docker exec laravel_curso npm install
	@docker exec laravel_curso npm run dev
mix-prod:
	@docker exec laravel_curso npm install
	@docker exec laravel_curso npm run prod
permission:
	@docker exec laravel_curso chmod 777 -R .
down:
	@docker-compose down -v
migrate:
	@echo "Running migrations"
	@echo "------------------------"
	@docker exec laravel_curso php artisan migrate --force
migrate-status:
	@echo "Migrations Status"
	@echo "------------------------"
	@docker exec laravel_curso php artisan migrate:status
seed:
	@echo "Running seed"
	@echo "------------------------"
	@docker exec laravel_curso php artisan db:seed
rollback:
	@echo "Rollback migrations"
	@echo "------------------------"
	@docker exec laravel_curso php artisan migrate:rollback --force
composer:
	@echo "Running composer clear-cache"
	@echo "------------------------"
	@docker exec laravel_curso composer clear-cache
	@echo "Running composer self-update"
	@echo "------------------------"
	@docker exec laravel_curso composer self-update
	@echo "Running composer install --no-interaction"
	@echo "------------------------"
	@docker exec laravel_curso composer install --no-interaction
db-test:
	@docker exec -i mysql mysql -u${DB_USERNAME} -p${DB_PASSWORD} -e "CREATE DATABASE IF NOT EXISTS testing"
	cp docker/.env-local-tests .env.testing
	@docker exec laravel_curso php artisan migrate --env=testing
	@docker exec laravel_curso php artisan db:seed --env=testing
test:
	@docker exec laravel_curso php artisan test
.PHONY: clean test code-sniff init
