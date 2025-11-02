#!/usr/bin/env bash
set -e

# Cache app for prod
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run DB migrations on each deploy (safe with --force)
php artisan migrate --force || true

# Hand off to Apache (listens on port 10000)
exec apache2-foreground
