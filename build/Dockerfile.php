FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD ./php/php.ini /usr/local/etc/php/php.ini

RUN addgroup -g 1000 exampaper && adduser -G exampaper -g exampaper -s /bin/sh -D exampaper

RUN mkdir -p /var/www/html

RUN chown exampaper:exampaper /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql