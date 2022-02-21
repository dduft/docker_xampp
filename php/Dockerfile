FROM php:7.0-fpm

RUN docker-php-ext-install pdo_mysql
COPY ./error-logging.ini $PHP_INI_DIR/conf.d