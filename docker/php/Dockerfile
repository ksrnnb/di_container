FROM php:7.4-fpm-alpine3.13

RUN apk update && apk add \
    git            \
    mariadb-client \
    php7-pdo_mysql \
    vim

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/php

COPY --from=composer /usr/bin/composer /usr/bin/composer