FROM php:7.2-apache
COPY src/ /var/www/html/


RUN apt-get install curl
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install curl