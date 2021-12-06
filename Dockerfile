FROM php:8.0-cli


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /SparkApi
COPY ./SparkApi ./
RUN composer install
#RUN composer install
EXPOSE 1337
CMD php -S 0.0.0.0:1337 -t public

#docker build -t frontend .
#docker run --name frontend --net dbwebb -p 1337:1337 frontend