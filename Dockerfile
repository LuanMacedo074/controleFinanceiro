# Use a imagem oficial do PHP para o Laravel
FROM php:8.2-fpm

# Instale as dependências do sistema e extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libpq-dev\
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# Define o diretório de trabalho dentro do container
WORKDIR /var/www

# Copia os arquivos do projeto Laravel para o container
COPY . /var/www

# Instala as dependências do Laravel usando o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Expor a porta do PHP-FPM (opcional)
EXPOSE 9000

# Inicia o servidor PHP-FPM
CMD ["php-fpm"]