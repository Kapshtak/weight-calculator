FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
RUN a2enmod rewrite
RUN service apache2 restart
