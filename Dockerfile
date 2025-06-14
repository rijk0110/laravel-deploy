FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    npm \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Schakel mod_rewrite in voor Laravel
RUN a2enmod rewrite

# Installeer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html

EXPOSE 80
