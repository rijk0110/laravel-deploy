# Gebruik PHP met Apache
FROM php:8.2-apache

# Installeer afhankelijkheden
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

# Kopieer aangepaste Apache config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Stel werkmap in
WORKDIR /var/www/html

# Kopieer projectbestanden naar image
COPY . /var/www/html

# Zorg dat alle bestanden juiste permissies hebben
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Installeer PHP-packages
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Genereer app key
RUN php artisan key:generate

# Zorg dat Apache draait op poort 80
EXPOSE 80

# Start Apache in de voorgrond
CMD ["apache2-foreground"]
