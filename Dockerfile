FROM php:7.4

RUN docker-php-source extract && docker-php-ext-install pdo_mysql mysqli && docker-php-source delete

RUN apt-get update && apt-get install -y curl git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY database/install_db.sql /docker-entrypoint-initdb.d/
