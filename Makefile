#.PHONY: help

help:           ## Show this help.
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'


current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# 👌 Main targets

build: start deps ## Build docker container, composer install and up containers

deps: composer-install

# 🐘 Composer

composer-install: CMD=install
composer-update: CMD=update

# Usage example (add a new dependency): `make composer CMD="require --dev symfony/var-dumper ^4.2"`
composer composer-install composer-update:
	@docker exec -it appto-php composer $(CMD)



# 🕵️ Clear cache
# OpCache: Restarts the unique process running in the PHP FPM container
# Nginx: Reloads the server

reload:
	@docker-compose exec php-fpm kill -USR2 1
	@docker-compose exec nginx nginx -s reload

# ✅ Tests

test: ## test your application
	@docker exec -it appto-php make run-tests

acceptance: ## Acceptance Test application
	@docker exec -it appto-php make run-acceptance-tests


coverage: ## phpunit code coverage
	@docker exec -it appto-php make run-coverage

run-tests:
	mkdir -p tests/_data/coverage/phpunit
	./vendor/bin/phpunit --exclude-group='disabled' --log-junit tests/_data/coverage/phpunit/junit.xml tests

run-acceptance-tests:
	vendor/bin/behat --config tests/Acceptance/Appto/behat.yml

run-coverage:
	mkdir -p tests/_data/coverage/phpunit
	./vendor/bin/phpunit --coverage-html tests/_data/coverage/phpunit


# 🐳 Docker Compose
start: ## up docker containers
	@docker-compose up --build -d

start-ci:
	docker-compose build --build-arg SSH_PRIVATE_KEY="$(cat ~/.ssh/amelendres)"
	docker-composer up


restart: ## restart your containers
	make stop
	@docker-compose up --build -d

stop: CMD=stop

destroy: CMD=down

sh:
	@docker exec -it appto-php sh


# Usage: `make doco CMD="ps --services"`
# Usage: `make doco CMD="build --parallel --pull --force-rm --no-cache"`
doco stop destroy:
	@docker-compose $(CMD)

rebuild: ## rebuild your containers (LONG TIME - take your coffe)
	docker-compose build --pull --force-rm --no-cache
	make deps
	make start


# 🗄️ Data Base (AVOID in production)
db: ## create database and load fixtures
		@docker exec -it appto-php make init-db
		@docker exec -it appto-php make load-fixtures

dbrefresh: ## rebuild database and load fixtures
		@docker exec -it appto-php make regenerate-db

init-db:
		bin/console d:d:c 
		bin/console d:s:u --force
		
load-fixtures:		
	    bin/console d:f:l -n

regenerate-db: delete-db init-db load-fixtures

delete-db:
		bin/console d:d:d --force
		
# 📝 Api commands
api-doc: ## generate or update swagger API Doc
		@docker exec -it appto-php vendor/zircote/swagger-php/bin/openapi src/Appto -o public/api_v1.json


