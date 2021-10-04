FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
        wget git unzip \
        libfreetype6-dev \
        nano \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
	    libmemcached-dev \
        libicu-dev \
        libpq-dev \
        libxslt-dev \
        librabbitmq-dev \
        zlib1g-dev \
        libmagickwand-dev \
        libmagickcore-dev \
	    curl \
	    postgresql \
	    imagemagick \
	    libzip-dev \
        libpng-dev \
        libturbojpeg-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
    && pecl install xdebug \
    && pecl install redis \
    && pecl install apcu \
    && pecl install amqp \
    && pecl install imagick \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install xml \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable apcu \
    && docker-php-ext-install xsl \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql \
    && docker-php-ext-enable amqp

WORKDIR /var/www
# Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer

# PHPUnit
RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit
RUN command -v phpunit

# Other
RUN mkdir ~/.ssh
RUN touch ~/.ssh/config

# Display versions installed
RUN php -v
RUN composer --version
RUN phpunit --version
