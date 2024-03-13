FROM php:8.2-fpm-alpine

COPY --from=composer:2.1 /usr/bin/composer /usr/local/bin/composer