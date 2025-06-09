FROM php:8.3-apache

# Habilitamos mod_rewrite para Laravel
RUN a2enmod rewrite

# Instalamos dependencias de sistema
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev libjpeg-dev libfreetype6-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        zip \
        bcmath \
        gd \
        intl

# Node y npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalamos las dependencias PHP con Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN cp .env.example .env && php artisan key:generate

# Copiamos los archivos de Laravel al contenedor
WORKDIR /var/www/html
COPY . /var/www/html/

# Damos permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Apache config: habilita .htaccess y rutas Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
