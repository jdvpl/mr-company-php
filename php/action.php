<?php
session_start();
include '../env/conexion.php';
date_default_timezone_set("America/Bogota");


if (isset($_POST['registro'])) {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $nombre= $_POST['nombre'];
    $nombre = mb_strtoupper($nombre);
    $nombre=trim($nombre);
    $apellido = $_POST['apellido'];
    $apellido=trim($apellido);
    $apellido=mb_strtoupper($apellido);
    $correo_electronico= $_POST['email'];
    $correo_electronico=strtolower($correo_electronico);
    $email=$correo_electronico;
    $password = md5($_POST['password']);
    $repetirpassword=md5($_POST['repetirpassword']);
    $fecha_registro = date('Y-m-d H:i:s');

    
    if($nombre ==""){
        echo json_encode(array('error'=>true, 'tipo'=>'El campo Nombre es obligatorio.'));
        exit;
    }
    if($apellido ==""){
        echo json_encode(array('error'=>true, 'tipo'=>'El campo Apellido es obligatorio.'));
        exit;
    }
    if($email ==""){
        echo json_encode(array('error'=>true, 'tipo'=>'El campo Correo electrónico es obligatorio.'));
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo json_encode(array('error'=>true, 'tipo'=>'El correo electrónico ingresado es invalido.'));
        exit;
    }
    if($password !=$repetirpassword){
        echo json_encode(array('error'=>true, 'tipo'=>'Las contraseñas digitadas no coinciden.'));
        exit;
    }
    if($password ==""){
        echo json_encode(array('error'=>true, 'tipo'=>'El campo de Contraseña es obligatorio.'));
        exit;
    }

    $query = "SELECT * FROM clientes where correo='$email'";
    $resultado = $conexion->query($query);
    if ($resultado->num_rows > 0) {
        echo json_encode(array('error'=>true, 'tipo'=>'El correo electrónico digitado ' . $email . ' ya se encuentra registrado en el sistema.'));
        exit;
    }else{
        $query = "INSERT INTO clientes(
            nombre,
            apellido,
            correo,
            clave,
            fecha_registro,
            ip )VALUES
            (
            '$nombre',
            '$apellido',
            '$email',
            '$password',
            '$fecha_registro',
            '$ip')";
        
        $resultado = $conexion->query($query);
        $error = $conexion->error;
        if ($resultado) {
            $_SESSION['correo']=$email;
            echo json_encode(array('error'=>false, 'tipo'=>''));
        } else {
            echo json_encode(array('error'=>true, 'tipo'=>'Error en el servidor '.$error.''));
            exit;
        }
    }
}  

if (isset($_POST['login'])) {
    
    $email= $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM clientes where correo='$email' and clave='$password'";
    $resultado = $conexion->query($query);
 
    if ($resultado->num_rows == 1) {
        $_SESSION['correo']=$email;

        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'Correo o contraseña erroneas'));
        exit;
    }

}

if(isset($_POST['olvido'])){
    $email= $_POST['email'];
    $hash = md5(rand(0, 1000000));

    $query = "SELECT * FROM clientes where correo='$email'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows == 1) {
        $_SESSION['email']=$email;
        $_SESSION['hash']=$hash;
        $query2 = "UPDATE clientes set hash='$hash' WHERE correo='$email'";
        $result = $conexion->query($query2);
        echo json_encode(array('error'=>false, 'tipo'=>'Se envio los datos para actualizar su contraseña'));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'El correo '.$email. ' no existe.'));
        exit;
    }
}
if(isset($_POST['recupero'])){
    $password = md5($_POST['password']);
    $repetirpassword=md5($_POST['repetirpassword']);
    $email= $_POST['email'];

    if($password !=$repetirpassword){
        echo json_encode(array('error'=>true, 'tipo'=>'Las contraseñas digitadas no coinciden.'));
        exit;
    }
    if($password ==""){
        echo json_encode(array('error'=>true, 'tipo'=>'El campo de Contraseña es obligatorio.'));
        exit;
    }
    $query = "UPDATE clientes set clave='$password' WHERE correo='$email'";
    $resultado = $conexion->query($query);
    
    if ($resultado) {
        $_SESSION['correo']=$email;
        echo json_encode(array('error'=>false, 'tipo'=>''));
    } else {
        echo json_encode(array('error'=>true, 'tipo'=>'Error en el servidor '.$error.''));
        exit;
    }
}

