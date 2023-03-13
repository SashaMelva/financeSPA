FROM phpdockerio/php:8.2-fpm
WORKDIR "/financeSPA"


RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.2-mysql; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* 

RUN curl -sS https://getcomposer.org/installer | \
    php -- --2 --install-dir=/usr/local/bin --filename=composer \
