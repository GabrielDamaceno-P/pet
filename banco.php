<?php
try{
    $conn = new PDO("mysql: host=localhost;dbname=gabriel", "root", "");
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "erro de conexão: ".$e->getMessage();
    die();
}
?>