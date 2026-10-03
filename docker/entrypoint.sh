#!/bin/bash
set -e

cd /home/user/app

echo "=================================================="
echo "  Portfolio Ariel - Hugging Face Spaces Startup"
echo "=================================================="

# Ensure required directories exist with proper permissions
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p /tmp/nginx

echo "==> [1/6] Running database migrations..."
php artisan migrate --force --no-interaction || true

echo "==> [2/6] Creating storage symlink..."
php artisan storage:link || true

echo "==> [3/6] Caching configuration..."
php artisan config:cache

echo "==> [4/6] Caching routes..."
php artisan route:cache

echo "==> [5/6] Caching views..."
php artisan view:cache

echo "==> [6/6] Fixing permissions..."
chmod -R 775 storage bootstrap/cache /tmp/nginx

echo "==> Startup complete. Launching supervisord..."
exec supervisord -c /etc/supervisord.conf