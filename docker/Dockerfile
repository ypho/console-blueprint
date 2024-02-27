FROM php:8.3-alpine

WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# Install pcov code coverage driver
RUN install-php-extensions pcov

# Install xdebug
#RUN install-php-extensions xdebug
#COPY docker/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/