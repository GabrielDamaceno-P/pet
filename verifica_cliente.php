<?php

include 'banco.php';

session_start();
if(!isset ($_SESSION['usuario_id'])){
    $_SESSION ['mensagem'] = 'Faça o login';
    header('Location: pagina.php');

    exit();
}

echo "Você esta logado"; 

?>