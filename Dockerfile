# Dockerfile para Render (P4). Un solo contenedor con Apache + PHP.
# El de la P3 (PHP-FPM, usado por docker-compose) está en php/Dockerfile.
FROM php:8.2-apache

# Driver de MySQL para PDO (PDO ya viene incluido en la imagen)
RUN docker-php-ext-install pdo_mysql

# Certificado de Aiven para verificar la conexión cifrada (es público)
COPY certs/aiven-ca.pem /etc/ssl/certs/aiven-ca.pem

# Solo el código de la aplicación: así db/init.sql no queda accesible desde internet
COPY src/ /var/www/html/

EXPOSE 80
