<?php
session_start();
include '../../env/conexion.php';
date_default_timezone_set("America/Bogota");

if (isset($_POST['login'])) {    
    $email= $_POST['email'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM administradores where correo='$email' and contrasena='$password'";
    $resultado = $conexion->query($query);
    if ($resultado->num_rows == 1) {
        $_SESSION['email']=$email;
        echo json_encode(array('error'=>false, 'tipo'=>''));
        header('../page/admin');
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'Correo o contraseña erroneas o no existe el usuario'));
        header('../page/index');
        exit;
    }
}

if (isset($_POST['categoria_insert'])) {
    $categoria= $_POST['categoria'];
    $descripcion_categoria = $_POST['descripcion_categoria'];
    $query = "INSERT INTO categoria (nombre,descripcion) VALUES ('$categoria', '$descripcion_categoria')";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'La categoria ya existe '.$conexion->error));
        exit;
    }

}
if (isset($_POST['actualizarCategoria'])) {
    $id_categoria=$_POST['id_categoria'];
    $nombre=$_POST['nombre'];
    $descripcion_categoria=$_POST['descripcion_categoria'];
    
    $query = "UPDATE categoria set nombre='$nombre',descripcion='$descripcion_categoria'WHERE id_categoria='$id_categoria'";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'La categoria ya existe '.$conexion->error));
        exit;
    }
}

// productos
if (isset($_POST['product_insert'])) {
    $nombre_producto= $_POST['nombre_producto'];
    $color= $_POST['color'];
    $descuento= $_POST['descuento'];
    $cantidad= $_POST['cantidad'];
    $tallas= $_POST['tallas'];
    $precio= $_POST['precio'];
    $categoria= $_POST['categoria'];
    $descripcion_producto= $_POST['descripcion_producto'];
    $etiqueta= $_POST['etiqueta'];
    
    $tmp = $_FILES['imagen']['tmp_name'];
    $tmp1 = $_FILES['imagen']['name'];
    $extension = pathinfo($tmp1, PATHINFO_EXTENSION);
    $imagen = $nombre_producto."_". rand(0, 9999999) . "." . $extension;
    $x = preg_replace("/\r/", "", $imagen);
    move_uploaded_file($tmp, "../../uploads/" . $x);
    

    $query = "INSERT INTO productos (nombre,foto,color,descuento,cantidad,talla,precio,categoria,descripcion,etiqueta) VALUES ('$nombre_producto', '$imagen','$color','$descuento','$cantidad','$tallas','$precio','$categoria','$descripcion_producto','$etiqueta')";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>$query.$x, $extension));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'Error '.$conexion->error.$query.$x, $extension));
        exit;
    }

}

if (isset($_POST['actualizarProducto'])) {
    $id_categoria=$_POST['id'];
    $nombre=$_POST['nombre'];
    $imagen=$_POST['imagen'];
    $foto=$_POST['foto'];
    echo json_encode(array('error'=>true, 'tipo'=>$imagen.$foto));
        exit;
    $query = "UPDATE categoria set nombre='$nombre',descripcion='$descripcion_categoria'WHERE id_categoria='$id_categoria'";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'La categoria ya existe '.$conexion->error));
        exit;
    }
}
// admin
if (isset($_POST['administradores_insert'])) {
    $correo= $_POST['correo'];
    $contrasena= MD5($_POST['contrasena']);
    $tipo_usuario= $_POST['tipo_usuario'];

    $query = "INSERT INTO administradores (correo,contrasena,tipo_usuario) VALUES ('$correo', '$contrasena','$tipo_usuario')";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'La categoria ya existe '.$conexion->error));
        exit;
    }
}

if (isset($_POST['actualizarAdministrador'])) {
    $id=$_POST['id'];
    $correo=$_POST['correo'];
    $contrasena=MD5($_POST['contrasena']);
    $tipo_usuario=$_POST['tipo_usuario'];
    
    $query = "UPDATE administradores set correo='$correo',contrasena='$contrasena',tipo_usuario='$tipo_usuario' WHERE id='$id'";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo json_encode(array('error'=>false, 'tipo'=>''));
    }else{
        echo json_encode(array('error'=>true, 'tipo'=>'La categoria ya existe '.$conexion->error));
        exit;
    }
}

