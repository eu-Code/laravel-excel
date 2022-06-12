FROM php:8.0-fpm
WORKDIR /var/www/html
RUN apt-get update -y
RUN apt-get install -y libzip-dev libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev zip gcc libxml2 libxslt-dev libmongoc-1.0-0 libcurl4-openssl-dev pkg-config libssl-dev
RUN docker-php-ext-configure gd
RUN docker-php-ext-install zip gd xml pdo pdo_mysql sockets
RUN pecl install mongodb
RUN pecl config-set php_ini /etc/php.ini
RUN echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongodb.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
