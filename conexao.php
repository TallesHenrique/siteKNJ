<?php

$host = "localhost";
$usuario = "root";
$senha = "123456";
$bd = "teste";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
    echo "falha na conexão: (".$mysqli->connect_ernno.") ".$mysqli->connect_error;

?>