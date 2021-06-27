compose-bash:
	docker-compose run --rm app bash

compose-install:
	docker-compose run --rm app make install

install:
	composer install

validate:
	composer validate

compose-start:
	docker-compose up -d

start:
	php -S 0.0.0.0:8080 index.php

ci:
	docker-compose build
	docker-compose -f docker-compose.yml -p xsolla-test-ci run --rm app make install
	docker-compose -f docker-compose.yml -p xsolla-test-ci up

lint:
	composer exec phpcs -v

test:
	php tests

test-coverage:
	composer exec -v XDEBUG_MODE=coverage phpunit tests -- --coverage-clover build/logs/clover.xml

env-prepare:
	cp -n .env.example .env || true
