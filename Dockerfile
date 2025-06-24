# Use official PHP-FPM image as base
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nginx \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zlib1g-dev \
    # Install Node.js 20.x (LTS)
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    # PHP extensions
    && docker-php-ext-install pdo pdo_mysql zip bcmath mbstring xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copy Laravel files
WORKDIR /var/www/html
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev \
    && npm install \
    && npm run prod \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose ports
EXPOSE 8080

# Startup script
COPY docker/startup.sh /usr/local/bin/startup
RUN chmod +x /usr/local/bin/startup
CMD ["startup"]