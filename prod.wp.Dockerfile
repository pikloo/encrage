FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

RUN chown -R www-data:www-data . 