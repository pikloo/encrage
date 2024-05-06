FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

# this is necessary so that we can run container as www-data, not as root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2
RUN getcap /usr/sbin/apache2

# COPY ./website/wp-content /var/www/html/wp-content
RUN mkdir /etc/apache2/sites-available/ssl

ADD ./apache/000-default.prod.conf /etc/apache2/sites-available/000-default.conf
# enable apache module rewrite
# RUN a2enmod rewrite && a2enmod headers && a2enmod expires

# switch to www-data
# USER www-data
RUN chown -R www-data:www-data . && a2enmod rewrite ssl
