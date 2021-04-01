FROM debian:buster
WORKDIR /
RUN echo 'debconf debconf/frontend select Noninteractive' \
| debconf-set-selections
RUN apt-get update && apt-get install -y vim wget nginx \
mariadb-server php-fpm php-mysql php-mbstring php-zip \
php-gd php-xml php-pear php-gettext php-cgi gpg php-curl \
php-intl php-soap php-xmlrpc

#phpmyadmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/\
phpMyAdmin-5.0.2-all-languages.tar.gz
RUN gpg --keyserver hkp://p80.pool.sks-keyservers.net:80 --recv-key \
3D06A59ECE730EB71B511C17CE752F178259BD92 && wget https://files\
.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.\
tar.gz.asc && gpg --verify phpMyAdmin-5.0.2-all-languages.tar.gz.asc
RUN tar -zxvf phpMyAdmin-5.0.2\
-all-languages.tar.gz && mv phpMyAdmin-5.0.2-all-languages \
var/www/html/phpmyadmin && rm -f phpMyAdmin-5.0.2\
-all-languages.tar.gz && chown -R www-data:www-data /var/www/\
html/phpmyadmin
COPY srcs/config.inc.php var/www/html/phpmyadmin/\
config.inc.php
COPY srcs/conf.sql .
RUN chmod 665 var/www/html/phpmyadmin/config.inc.php && \
service mysql start && mysql < conf.sql

#wordpress
RUN wget https://wordpress.org/latest.tar.gz && tar -zxvf latest.tar.\
gz && mv wordpress var/www/html/wordpress && rm -f latest.tar.gz
COPY srcs/wp-config.php var/www/html/wordpress/wp-config.php
RUN chown -R www-data:www-data /var/www/html/wordpress

COPY srcs/ssl-params.conf etc/nginx/snippets/ssl-params.conf
COPY srcs/self-signed.conf etc/nginx/snippets/self-signed.conf
COPY srcs/nginx-selfsigned.crt etc/ssl/certs/nginx-selfsigned.crt
COPY srcs/nginx-selfsigned.key etc/ssl/private/nginx-selfsigned.key
COPY srcs/dhparam.pem etc/nginx/dhparam.pem
COPY srcs/run_service.sh run_service.sh
COPY srcs/nginx.conf etc/nginx/nginx.conf
COPY srcs/default etc/nginx/sites-enabled/default
RUN rm -f var/www/html/index.nginx-debian.html
COPY srcs/default .
COPY srcs/default_autoindex_off .
COPY srcs/autoindex_on.sh .
COPY srcs/autoindex_off.sh .
RUN chmod 665 autoindex_on.sh && chmod 665 autoindex_off.sh
COPY srcs/www.conf etc/php/7.3/fpm/pool.d/www.conf
EXPOSE 80 443
CMD bash run_service.sh
