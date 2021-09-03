FROM ubuntu:20.04
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get -y install software-properties-common
RUN add-apt-repository ppa:ondrej/php

# install nginx, php8 and other needed modules
RUN apt-get update && apt-get -y install curl \
    git \
    make \
    nginx \
    supervisor \
    unzip \
    wget \
    gnupg \
    gnupg1 \
    gnupg2

RUN apt-get update && apt-get -y install \
    php-common \
    php-fpm \
    php8.0-cli \
    php8.0-bz2 \
    php8.0-curl \
    php8.0-intl \
    php8.0-gd \
    php8.0-mbstring \
    php8.0-mysql \
    php8.0-pgsql \
    php8.0-opcache \
    php8.0-soap \
    php8.0-xml \
    php8.0-zip \
    php8.0-apcu \
    php8.0-memcached \
    php8.0-redis \
    php8.0-xdebug \
    php8.0-yaml

RUN apt-get clean && apt-get autoclean

RUN ln -s /usr/sbin/php-fpm8.0 /usr/sbin/php-fpm

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename composer
ENV COMPOSER_PROCESS_TIMEOUT=1800

RUN mkdir -p /var/log/php8
RUN mkdir -p /run/php

# add files
COPY nginx.conf        /etc/nginx/nginx.conf
COPY www.conf          /etc/php/8.0/fpm/pool.d/www.conf
COPY php.ini           /etc/php/8.0/fpm/php.ini
COPY php.ini           /etc/php/8.0/cli/php.ini
COPY nginx-phpfpm.conf /etc/supervisor/conf.d/nginx-phpfpm.conf

WORKDIR /app

EXPOSE 80
