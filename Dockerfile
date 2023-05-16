# Etapa de construcción
FROM composer:2.1 as builder

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --prefer-dist

# Etapa de producción
FROM php:8.1-apache

# Instalar dependencias de PHP necesarias
RUN docker-php-ext-install pdo_mysql

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto y las dependencias de la etapa de construcción
COPY --from=builder /app .

# Configurar permisos de almacenamiento
RUN chown -R www-data:www-data /var/www/html/storage

# Exponer el puerto del servidor web
EXPOSE 80

# Comando para iniciar el servidor web
CMD ["apache2-foreground"]