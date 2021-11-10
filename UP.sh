#!/bin/bash

echo ""
echo ""
echo ""
echo ""
echo "Parando os containers em execução... "
echo ""
echo ""
echo ""
echo ""

docker stop devsbook-oo-php-app
docker rm devsbook-oo-php-app

echo ""
echo ""
echo ""
echo ""
echo "Iniciando o processo de execução dos containers... "
echo ""
echo ""
echo ""
echo ""

echo ""
echo ""
echo "Criando a rede para os Containers Docker"
echo ""
sudo chmod -R 755 *

docker network create --subnet '192.168.100.0/24' --gateway '192.168.100.1' --label 'com.docker.compose.network=default' --label 'com.docker.compose.project=allapps' allapps_default

echo ""
echo ""
echo ""
echo "Creating image for devsbook-oo-php"
echo ""
echo ""
docker build -t moizesdocker/php74fpm:1.0   .
echo ""
echo ""
echo ""
echo "Image created."
echo ""
echo ""
echo ""
echo "Fazendo push para o DockerHub: moizesdocker/php74fpm:1.0 "
docker push moizesdocker/php74fpm:1.0

echo ""
echo ""
echo ""
rm  docker-compose.log
echo "Starting SISTEMA: 8691"
docker-compose up -d  >> docker-compose.log

echo ""
echo "Conectando container devsbook-oo-php-app a rede principal... "
echo ""
echo ""
echo ""
docker network connect principal devsbook-oo-php-app
