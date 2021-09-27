FROM php:7.2-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql

RUN mkdir /app \
    && mkdir /app/seaScan \
    && mkdir /app/seaScan/www

COPY . /app/seaScan/www/

RUN cp -r /app/seaScan/www/* /var/www/html
