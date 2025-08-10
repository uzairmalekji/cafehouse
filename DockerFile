# Use official PHP Apache image
FROM php:8.2-apache

# Enable PHP extensions (mysqli and pdo_mysql for MySQL support)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into Apache's web root
COPY . /var/www/html/

# Give Apache permissions to the files
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Enable Apache rewrite module (optional but useful)
RUN a2enmod rewrite