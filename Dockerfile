FROM php:7.2-fpm

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 1.6.5

RUN apt-get update \
   && apt-get install -y \
       zlib1g-dev \
       libxml2-dev \
       libpng-dev \
       libjpeg62-turbo-dev \
       libfreetype6-dev \
   && docker-php-ext-install pdo pdo_mysql mysqli zip xml intl \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-install -j$(nproc) gd \
   && curl -s -f -L -o /tmp/installer.php https://raw.githubusercontent.com/composer/getcomposer.org/b107d959a5924af895807021fcef4ffec5a76aa9/web/installer \
   && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
   && php composer-setup.php \
   && php -r "unlink('composer-setup.php');" \
   && mv composer.phar /usr/local/bin/composer \
   && rm -rf /tmp/*
