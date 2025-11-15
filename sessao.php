<?php

session_start();
if(!isset ($_SESSION['id_usuario'])){
    $_SESSION ['mensagem'] = 'Faça o login primeiro';
    header('Location: pagina.php');

    exit;
}

$nome = $_SESSION['nome'];
$id = $_SESSION['id_usuario']

?>