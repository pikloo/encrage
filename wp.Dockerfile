FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

RUN a2enmod ssl && a2enmod rewrite
RUN mkdir -p /etc/apache2/ssl

COPY ./ssl/*.pem /etc/apache2/ssl/
COPY ./apache/default.conf /etc/apache2/sites-available/000-default.conf

# this is necessary so that we can run container as www-data, not as root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2
RUN getcap /usr/sbin/apache2

# copy all of our development code
COPY ./website/wp-content /var/www/html/wp-content

# switch to www-data
USER www-data

EXPOSE 80
EXPOSE 443