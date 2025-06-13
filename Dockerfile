FROM php:8.2-fpm

# Instala extensiones necesarias para Symfony
RUN apt-get update \
    && apt-get install -y libicu-dev git zip unzip \
    && docker-php-ext-install intl pdo pdo_mysql

# Copia el código de la aplicación
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependencias de Doctrine necesarias para Symfony
RUN composer require symfony/orm-pack doctrine/doctrine-bundle --no-interaction

# Instala dependencias de PHP
RUN composer install --no-interaction --optimize-autoloader

# Da permisos a la carpeta var
RUN chown -R www-data:www-data var

EXPOSE 9000
