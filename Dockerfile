# --- Build front-end assets (remove this stage if you don't use Vite/Mix) ---
    FROM node:18 AS assets
    WORKDIR /app
    COPY package*.json ./
    # If your project doesn't have package.json, delete this assets stage and the COPY --from=assets line below
    RUN npm ci || true
    COPY . .
    RUN [ -f package.json ] && npm run build || true
    
    # --- PHP + Apache runtime ---
    FROM php:8.2-apache
    
    WORKDIR /var/www/html
    
    # System deps + PHP extensions for PostgreSQL
    RUN apt-get update \
      && apt-get install -y git unzip libpq-dev \
      && docker-php-ext-install pdo pdo_pgsql
    
    # Apache: enable rewrite and point DocumentRoot to /public
    RUN a2enmod rewrite \
      && sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
      && sed -i 's|Listen 80|Listen 10000|g' /etc/apache2/ports.conf
    
    # Composer
    COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
    
    # App code
    COPY . /var/www/html
    # Built assets (if any)
    COPY --from=assets /app/public /var/www/html/public
    
    # PHP deps + optimize
    RUN composer install --no-dev --prefer-dist --optimize-autoloader \
      && php artisan storage:link || true \
      && chown -R www-data:www-data storage bootstrap/cache
    
    EXPOSE 10000
    
    # Entrypoint: cache config/routes/views and run migrations, then start Apache
    COPY docker/entrypoint.sh /entrypoint.sh
    RUN chmod +x /entrypoint.sh
    CMD ["/entrypoint.sh"]
    