# =======================
# 1. BUILD STAGE
# =======================
FROM php:8.3-cli AS builder

WORKDIR /var/www

# Installer les dépendances
RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo_pgsql zip \
    && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le projet et installer les dépendances
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# =======================
# 2. FINAL STAGE
# =======================
FROM php:8.3-fpm

WORKDIR /var/www

# Copier uniquement le code et les dépendances compilées
COPY --from=builder /var/www /var/www

# Assurer les permissions correctes
RUN chown -R www-data:www-data /var/www

# Exposer le port de PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
