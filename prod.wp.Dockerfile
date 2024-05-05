FROM wordpress:php8.3-apache

RUN apt-get update
RUN apt-get install -y libcap2-bin

# RUN a2enmod ssl && a2enmod rewrite
# RUN mkdir -p /etc/apache2/ssl

# COPY ./ssl/*.pem /etc/apache2/ssl/
# COPY ./apache/default.conf /etc/apache2/sites-available/000-default.conf

# this is necessary so that we can run container as www-data, not as root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2
RUN getcap /usr/sbin/apache2

# copy all of our development code
# COPY ./website/wp-content /var/www/html/wp-content

ADD ./apache/000-default.prod.conf /etc/apache2/sites-available/000-default.conf
# RUN a2ensite default-ssl.conf
RUN a2ensite 000-default.conf
# enable apache module rewrite
RUN a2enmod rewrite && a2enmod headers && a2enmod expires && a2enmod ssl

# switch to www-data
USER www-data

# EXPOSE 80
# EXPOSE 443


# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# RUN sed -i -e "s/post_max_size \= 8M/post_max_size \= 30M/g" "$PHP_INI_DIR/php.ini"
# RUN sed -i -e "s/upload_max_filesize \= 2M/upload_max_filesize \= 20M/g" "$PHP_INI_DIR/php.ini"
# RUN sed -i -e "s/session.gc_maxlifetime \= 1440/session.gc_maxlifetime \= 86400/g" "$PHP_INI_DIR/php.ini"
# #change uid and gid of apache to docker user uid/gid
# RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
# ADD ./ssl/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
