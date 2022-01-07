<?php
session_start();
if(isset($_SESSION['correo'])){
  $email=$_SESSION['correo'];

  $query = "SELECT nombre FROM clientes where correo='$email'";
  $stmt1 = $conexion->prepare($query);
  $stmt1->execute();
  $result1 = $stmt1->get_result();
  $nommbre = "";
  while ($row = $result1->fetch_assoc()) {
     $nommbre = $row['nombre'];
  }
}