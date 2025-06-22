FROM php:8.3-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    libjpeg-dev libfreetype6 libpq-dev libcurl4-openssl-dev libssl-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd intl dom

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar el código
COPY . /var/www/html
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf


# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Ir al directorio del proyecto
WORKDIR /var/www/html

# 🔐 Habilitar el uso de Git con distinto usuario
RUN git config --global --add safe.directory /var/www/html

# Instalar dependencias y preparar Laravel
RUN composer install --no-dev --optimize-autoloader && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Exponer puerto 80
EXPOSE 80

CMD ["apache2-foreground"]
