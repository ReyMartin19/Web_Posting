# --- Build front-end assets ---
    FROM node:18 AS assets
    WORKDIR /app
    COPY package*.json ./
    RUN npm ci || true
    COPY . .
    RUN [ -f package.json ] && npm run build || true
    
    # --- PHP + Apache runtime ---
    FROM php:8.2-apache
    
    # Set working directory
    WORKDIR /var/www/html
    
    # System dependencies + PHP extensions (for PostgreSQL)
    RUN apt-get update \
        && apt-get install -y git unzip libpq-dev libzip-dev zip \
        && docker-php-ext-install pdo pdo_pgsql
    
    # Enable Apache rewrite module and change port
    RUN a2enmod rewrite \
        && sed -i 's|Listen 80|Listen 10000|g' /etc/apache2/ports.conf \
        && sed -i 's|<VirtualHost \*:80>|<VirtualHost *:10000>|g' /etc/apache2/sites-available/000-default.conf
    
    # Configure Apache VirtualHost for Laravel
    RUN echo '<VirtualHost *:10000>\n\
        DocumentRoot /var/www/html/public\n\
        <Directory /var/www/html/public>\n\
            Options -Indexes +FollowSymLinks\n\
            AllowOverride All\n\
            Require all granted\n\
            DirectoryIndex index.php index.html\n\
        </Directory>\n\
        ErrorLog ${APACHE_LOG_DIR}/error.log\n\
        CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
    </VirtualHost>' > /etc/apache2/sites-available/000-default.conf
    
    # Copy Composer from the official image
    COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
    
    # Copy application files
    COPY . /var/www/html
    
    # Copy built frontend assets (if applicable)
    COPY --from=assets /app/public /var/www/html/public
    
    # Install PHP dependencies
    RUN composer install --no-dev --prefer-dist --optimize-autoloader \
        && php artisan key:generate --force \
        && php artisan storage:link || true \
        && chown -R www-data:www-data storage bootstrap/cache public
    
    # Expose Render port
    EXPOSE 10000
    
    # Copy entrypoint script
    COPY docker/entrypoint.sh /entrypoint.sh
    RUN chmod +x /entrypoint.sh
    
    # Start command
    CMD ["/entrypoint.sh"]