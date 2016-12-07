FROM php:5.6-fpm
MAINTAINER Micooz <micooz@hotmail.com>

RUN apt-get update
RUN apt-get install -y zip

ENV OCI_INSTANT_PATH /usr/lib/instantclient_12_1
ENV LD_LIBRARY_PATH $LD_LIBRARY_PATH:$OCI_INSTANT_PATH

RUN cd /usr/lib \
    && curl -L -o instantclient-basic-linux.x64.zip http://files.saas.hand-china.com/oracle/instantclient/instantclient-basic-linux.x64-12.1.0.2.0.zip \
    && curl -L -o instantclient-sdk-linux.x64.zip http://files.saas.hand-china.com/oracle/instantclient/instantclient-sdk-linux.x64-12.1.0.2.0.zip \
    && unzip instantclient-basic-linux.x64.zip && unzip instantclient-sdk-linux.x64.zip \
    && ln -s $OCI_INSTANT_PATH/libclntsh.so.*.1  $OCI_INSTANT_PATH/libclntsh.so \
    && ln -s $OCI_INSTANT_PATH/libclntshcore.so.*.1 $OCI_INSTANT_PATH/libclntshcore.so \
    && ln -s $OCI_INSTANT_PATH/libocci.so.*.1 $OCI_INSTANT_PATH/libocci.so \
    && rm instantclient*.zip

# Do -dev installtion at first, because 'docker-php-ext-install'
# will use these library to compile the sources before install.
# see ..... for more information.
RUN apt-get install -y vim 

RUN apt-get install -y libcurl4-gnutls-dev libpng-dev libmcrypt-dev libsqlite3-dev\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure oci8 --with-oci8=shared,instantclient,$OCI_INSTANT_PATH \
    && docker-php-ext-install -j$(nproc) gd \

    # no dependency extension
    && docker-php-ext-install gettext mysqli opcache pdo_mysql sockets mbstring json mysql pdo_sqlite exif oci8


# Change your php settings in php.ini and copy it to the right path.
COPY php-fpm/php.ini /usr/local/etc/php/php.ini