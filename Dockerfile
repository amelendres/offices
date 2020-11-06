FROM php:7.4.11-fpm-alpine3.12

WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ icu-dev rabbitmq-c rabbitmq-c-dev \
    && pecl install amqp-1.9.4 \
    && pecl install apcu-5.1.17 \
    && pecl install xdebug-2.9.8 \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        pdo_mysql \
    && docker-php-ext-enable \
        amqp \
        apcu \
        opcache

COPY docker/php/ /usr/local/etc/php/

RUN mkdir -p /app/var/cache
RUN mkdir -p /app/var/logs
RUN chown -R www-data /app/var/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
