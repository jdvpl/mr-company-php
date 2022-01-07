<?php
session_start();
if(isset($_SESSION['correo'])){
  $email=$_SESSION['correo'];

  $query = "SELECT nombre,id FROM clientes where correo='$email'";
  $stmt1 = $conexion->prepare($query);
  $stmt1->execute();
  $result1 = $stmt1->get_result();
  $nommbre = "";
  $id_user="";
  while ($row = $result1->fetch_assoc()) {
     $nommbre = $row['nombre'];
     $id_user=$row['id'];
  }
  $_SESSION['id_user']=$id_user;

}