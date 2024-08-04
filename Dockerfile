FROM php:8.3-apache
WORKDIR /var/www/html

RUN a2enmod rewrite

RUN apt update && apt install -y zip && rm -rf /var/cache/apt

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . .
