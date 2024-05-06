FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

# this is necessary so that we can run container as www-data, not as root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2
RUN getcap /usr/sbin/apache2

ADD ./apache/000-default.prod.conf /etc/apache2/sites-available/000-default.conf

# COPY ./website/wp-content /var/www/html/wp-content
RUN mkdir /etc/apache2/sites-available/ssl

COPY ./ssl/cert.pem /etc/apache2/sites-available/ssl/cert.pem
COPY ./ssl/key.pem /etc/apache2/sites-available/ssl/key.pem


RUN a2enmod rewrite && a2enmod ssl && a2enmod proxy && a2enmod proxy_balancer &&  a2enmod proxy_http

RUN service apache2 restart

# enable apache module rewrite
# RUN a2enmod rewrite && a2enmod headers && a2enmod expires

# switch to www-data
# USER www-data
RUN chown -R www-data:www-data . 

# EXPOSE 80

WORKDIR /var/www/html
