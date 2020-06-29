# Passos para rodar o projeto


####1->  crie no banco mysql um schema 'maktub'

####2->  configure o arquivo ./config/conexaoMysql.php

$server = (string) "localhost";
$user = (string) <Nome de usuario>;
$password = (string) <Senha do usuario>;    
$database = (string) "maktub"; 

####3->  execute o script database.sql para criar as tabelas no banco