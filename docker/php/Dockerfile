FROM php:8.1-apache
COPY ./html /var/www/html
COPY ./src /var/www/html
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
