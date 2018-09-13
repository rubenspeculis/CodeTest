FROM php:7.0-cli
RUN pecl install xdebug
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.enable=1' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.remote_port=9000' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.remote_connect_back=0' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.idekey=${IDE_KEY}' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.remote_enable=1' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.remote_host=${REMOTE_HOST}' >> $PHP_INI_DIR/conf.d/xdebug.ini \
  && echo 'xdebug.remote_autostart=1' >> $PHP_INI_DIR/conf.d/xdebug.ini