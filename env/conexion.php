<?php

require 'variable.php';

$conexion=new mysqli($hosting,$user,$pass,$bd);

if($conexion->connect_error){
    die("Conexion fallida ".$conexion->connect_error);
    echo "fallo la conexion";
}