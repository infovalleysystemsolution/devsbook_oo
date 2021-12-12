Projeto Desenvolvido com Base no Curso de PHP 7.4 POO

O projeto foi melhorado, foi implementado várias melhorias, como o Docker, SSL e etc.

Instale o Docker caso não tenha instalado no micro.

Renomei o arquivo docker-compose.example.yml para docker-compose.yml.

Ajuste o docker-compose.yml de acordo com o seu ambiente.

O docker compose utiliza uma imagem de container pronta no Docker Hub, mas esta sendo fornecido
também o arquivo Dockerfile que cria o container do PHP; a demais imagens utilizadas são de 
terceiros.

Renomei o arquivo config.example.php para config.php e ajuste os valores de acordo com o seu
ambiente.

Renomei o aquivo UP.example.sh para UP.sh.

Use o script UP.sh para executar o docker compose, provavelmente será necessário ajustar o usuário
e senha do MySQL.

Crie um Banco de Dados no MySQL, detalhes no script: devsbook.sql
