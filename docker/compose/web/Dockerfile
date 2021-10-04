FROM casr-php

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
RUN chmod 777 /var/log
COPY conf.ini $PHP_INI_DIR/conf.d/
COPY xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini
COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
CMD apachectl -D FOREGROUND
RUN usermod -u 1000 www-data
