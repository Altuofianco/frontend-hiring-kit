
# P.S This Dockerfile creates a multi-stage build for a PHP application using Composer, created just for development and testing purposes.

# Build stage for Composer
FROM composer:2 AS composer-builder

# Serve stage for PHP application
FROM php:8.2-cli-alpine AS serve

# Install system dependencies
RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        zlib-dev \
        libpng-dev \
        jpeg-dev \
        freetype-dev \
        libzip-dev \
        libc-dev \
        libintl \
        gettext-dev \
        libxslt-dev \
        libsodium-dev \
        icu-dev \
        nano \
        bash \
        curl 

# Install PHP extensions
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) \
    zip \
    gettext \
    sodium \
    opcache \
    xsl \
    gd 
    
# Enable PHP extensions
RUN docker-php-ext-enable \ 
    sodium \
    zip \
    opcache \
    gd \
    xsl \
    intl

# Set working directory
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer-builder /usr/bin/composer /usr/local/bin/composer

COPY  ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 8080

ENTRYPOINT [ "entrypoint.sh" ]