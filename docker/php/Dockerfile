FROM php:8.1-fpm-alpine

RUN apk update && apk add --no-cache \
    curl \
    zip \
    unzip \
    git \
    postgresql-dev \
    php-pear \
    autoconf \
    gcc \
    musl-dev \
    linux-headers\
    make

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html/vacation-system

COPY . /var/www/html/vacation-system

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

RUN chown -R www-data:www-data /var/www/html

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
