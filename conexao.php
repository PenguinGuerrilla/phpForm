<?php

    $hostname = "localhost";
    $bd = "phpForm";
    $user = "root";
    $psswd = "";
    $connect = mysqli_connect($hostname, $user, $psswd, $bd);
    if(!$connect){

        die("Falha ao conectar com o banco de dados:(" . $mysqli_connect_error() . ")");
    } else echo '<script>console.log("Conectado ao Banco de Dados")</script>';

?>