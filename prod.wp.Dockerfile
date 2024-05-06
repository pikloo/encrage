FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

# this is necessary so that we can run container as www-data, not as root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2
RUN getcap /usr/sbin/apache2

ADD ./apache/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# COPY ./website/wp-content /var/www/html/wp-content
RUN mkdir /etc/apache2/sites-available/ssl

COPY ./ssl/cert.pem /etc/apache2/sites-available/ssl/cert.pem
COPY ./ssl/key.pem /etc/apache2/sites-available/ssl/key.pem


RUN a2ensite default-ssl && a2enmod rewrite && a2enmod ssl

RUN service apache2 restart

RUN service apache2 stop

# enable apache module rewrite
# RUN a2enmod rewrite && a2enmod headers && a2enmod expires

# switch to www-data
# USER www-data
RUN chown -R www-data:www-data . 

# EXPOSE 80

WORKDIR /var/www/html
