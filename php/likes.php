<?php
session_start();
include '../env/conexion.php';
date_default_timezone_set("America/Bogota");


$id_user=$_SESSION['id_user'];
$tipo=$_POST["tipo"];
$id=$_POST["id"];


if($tipo=="agregar"){
    $query = "INSERT INTO favoritos(id_user,id_producto )VALUES('$id_user','$id')";
    $resultado = $conexion->query($query);
    $error = $conexion->error;
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    } else {
        echo json_encode(array('error'=>true, 'tipo'=>'Error en el servidor '.$error.''));
        exit;
    }
}else if($tipo=="eliminar"){
    $query = "DELETE from favoritos where id_producto='$id' and id_user='$id_user'";
    $resultado = $conexion->query($query);
    $error = $conexion->error;
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    } else {
        echo json_encode(array('error'=>true, 'tipo'=>'Error en el servidor '.$error.''));
        exit;
    }
}
