FROM php:5.6-fpm
MAINTAINER  <chubo.he@hand-china.com>
#安装依赖包
RUN apt-get update
RUN apt-get install -y zip libaio-dev php5-dev
#设置ORACLE环境变量
ENV OCI_INSTANT_PATH /usr/lib/instantclient_12_1
#安装ORACLE
RUN cd /usr/lib \
    && curl -L -o instantclient-basic-linux.x64.zip http://files.saas.hand-china.com/oracle/instantclient/instantclient-basic-linux.x64-12.1.0.2.0.zip \
    && curl -L -o instantclient-sdk-linux.x64.zip http://files.saas.hand-china.com/oracle/instantclient/instantclient-sdk-linux.x64-12.1.0.2.0.zip \
    && unzip instantclient-basic-linux.x64.zip && unzip instantclient-sdk-linux.x64.zip \
    && ln -s $OCI_INSTANT_PATH/libclntsh.so.*.1  $OCI_INSTANT_PATH/libclntsh.so \
    && ln -s $OCI_INSTANT_PATH/libclntshcore.so.*.1 $OCI_INSTANT_PATH/libclntshcore.so \
    && ln -s $OCI_INSTANT_PATH/libocci.so.*.1 $OCI_INSTANT_PATH/libocci.so \
    && rm instantclient*.zip

RUN export ORACLE_HOME=/usr/lib/instantclient_12_1
#PHP扩展库的安装，以及可能需要的扩展列表
## Install Core extension
#
# bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv
# imap interbase intl json ldap mbstring mcrypt mssql mysql mysqli oci8 odbc opcache pcntl
# pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix
# pspell readline recode reflection session shmop simplexml snmp soap sockets spl standard
# sybase_ct sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zip
#
# Must install dependencies for your extensions manually, if need.
RUN apt-get install -y libcurl4-gnutls-dev libpng-dev libmcrypt-dev libsqlite3-dev\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \

    && docker-php-ext-configure pdo_oci --with-pdo-oci=shared,instantclient,/usr/lib/instantclient_12_1,12.1.0.2 \
    && docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/lib/instantclient_12_1 \
    # no dependency extension
    && docker-php-ext-install pdo_oci oci8 gettext mysqli opcache pdo_mysql sockets



# Change your php settings in php.ini and copy it to the right path.
COPY php.ini /usr/local/etc/php/php.ini
# 添加启动脚本
# ADD  php-fpm/start.sh /start.sh
# ENTRYPOINT ["/start.sh"]
CMD ["php-fpm"]
# RUN chmod -R 777 '/www/zentaopms/www/data/upload/1/'

# CMD /start.sh && tail -f