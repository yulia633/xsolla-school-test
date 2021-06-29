up:
	docker-compose up -d --build

down:
	docker-compose down


compose-bash:
	docker-compose run --rm app bash


compose-bash-mysql:
	docker exec -it xsolla-container bash


compose-install:
	docker-compose run --rm app make install


ci:
	docker-compose build
	docker-compose -f docker-compose.yml -p xsolla-test-ci run --rm app make install
	docker-compose -f docker-compose.yml -p xsolla-test-ci up


install:
	composer install


validate:
	composer validate


start:
	php -S 0.0.0.0:8080 public/index.php


lint:
	composer exec phpcs -v -- --standard=PSR12 public src -np


env-prepare:
	cp -n .env.example .env || true
