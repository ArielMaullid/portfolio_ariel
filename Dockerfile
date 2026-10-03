# ==================================================================
# STAGE 1: Composer dependencies
# ==================================================================
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --prefer-dist \
    --optimize-autoloader

# ==================================================================
# STAGE 2: Runtime (PHP-FPM + Nginx) - Hugging Face compatible
# ==================================================================
FROM php:8.3-fpm-alpine

# Create user with UID 1000 (required by Hugging Face Spaces)
RUN adduser -u 1000 -D -s /bin/sh user

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    postgresql-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    icu-dev \
    curl \
    git \
    unzip \
    bash \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_pgsql \
    pgsql \
    zip \
    gd \
    mbstring \
    bcmath \
    intl \
    opcache \
    pcntl

# Set working directory
WORKDIR /home/user/app

# Copy application source (dengan ownership user)
COPY --chown=user:user . .

# Copy vendor dari stage 1
COPY --from=vendor --chown=user:user /app/vendor ./vendor

# Copy config nginx, supervisor, entrypoint
COPY --chown=user:user docker/nginx.conf /etc/nginx/nginx.conf
COPY --chown=user:user docker/supervisord.conf /etc/supervisord.conf
COPY --chown=user:user docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Create required directories with proper permissions
RUN mkdir -p /home/user/app/storage/framework/cache \
             /home/user/app/storage/framework/sessions \
             /home/user/app/storage/framework/views \
             /home/user/app/storage/logs \
             /home/user/app/bootstrap/cache \
             /tmp/nginx \
 && chown -R user:user /home/user/app/storage /home/user/app/bootstrap/cache /tmp/nginx \
 && chmod -R 775 /home/user/app/storage /home/user/app/bootstrap/cache /tmp/nginx

# Switch to non-root user
USER user
ENV HOME=/home/user
ENV PATH=/home/user/.local/bin:$PATH

# Hugging Face Spaces default port
EXPOSE 7860

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]