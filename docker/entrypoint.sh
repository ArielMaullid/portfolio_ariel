#!/bin/bash
set -e

cd /var/www/html

echo "=================================================="
echo "  Portfolio Ariel - Container Startup"
echo "=================================================="

echo "==> [1/6] Running database migrations..."
php artisan migrate --force --no-interaction

echo "==> [2/6] Creating storage symlink..."
php artisan storage:link || true

echo "==> [3/6] Caching configuration..."
php artisan config:cache

echo "==> [4/6] Caching routes..."
php artisan route:cache

echo "==> [5/6] Caching views..."
php artisan view:cache

echo "==> [6/6] Fixing permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "==> Startup complete. Launching supervisord..."
exec supervisord -c /etc/supervisord.conf