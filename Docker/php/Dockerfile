FROM php:8-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql

COPY . /app

RUN cp -r /app/* /var/www/html/.