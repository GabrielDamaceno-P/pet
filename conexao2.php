<?php

$host = 'localhost';
$dbname = 'gabriel';
$username = 'root';
$password = '';

$conexao = new mysqli($host, $username, $password, $dbname);

if($conexao->connect_error){

    die("erro ao conectar ao banco de dados:".$conexao->connect_error);
}

?>