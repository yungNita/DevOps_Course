# Use official PHP-FPM image as base
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copy Laravel files
WORKDIR /var/www/html
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose ports
EXPOSE 8080

# Startup script
COPY docker/startup.sh /usr/local/bin/startup
RUN chmod +x /usr/local/bin/startup
CMD ["startup"]