FROM php:7.1.8-apache

MAINTAINER Paul Redmond

COPY . /srv/app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

WORKDIR /srv/app

RUN docker-php-ext-install mbstring pdo pdo_mysql \
    && chown -R www-data:www-data /srv/app

RUN chown -R $USER:www-data /srv/app/storage \
    && chown -R $USER:www-data /srv/app/bootstrap/cache \
    && a2enmod rewrite \
    && service apache2 restart



