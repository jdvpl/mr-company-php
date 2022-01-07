<?php
session_start();
require '../../env/conexion.php';
if(!isset($_SESSION['email'])){
  header('location: index');
}else{
  $email=$_SESSION['email'];
  $query = "SELECT tipo_usuario FROM administradores where correo='$email'";
  $stmt1 = $conexion->prepare($query);
  $stmt1->execute();
  $result1 = $stmt1->get_result();
  $nommbre = "";
  while ($row = $result1->fetch_assoc()) {
    $nommbre = $row['tipo_usuario'];
  }
  
}

