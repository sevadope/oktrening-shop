FROM php:8.1.19-fpm

# ENV USER_ID=1000

# Starting from scratch
RUN apt-get clean
RUN apt-get -y autoremove
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Dependencies
RUN apt-get update
RUN apt-get install -y dialog apt-utils

# Zip
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip

# Curl
RUN apt-get install -y libcurl3-dev curl && docker-php-ext-install curl

# PostgreSQL
RUN apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Custom php.ini config
COPY php.ini /usr/local/etc/php/php.ini

# Composer installation
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN chmod 0755 /usr/bin/composer

# Tools
RUN apt-get install -y nano

# Clean up
RUN apt-get clean
RUN apt-get -y autoremove
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set User
# RUN adduser --disabled-password --gecos '' --uid $USER_ID --gid 33 user
# USER user

# Set up default directory
WORKDIR /var/www/server

# Permissions
RUN chown -R www-data:www-data /var/www/server

EXPOSE 9000
