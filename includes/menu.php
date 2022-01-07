<?php
require '../env/conexion.php';
require '../php/archivo_session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Enjed</title>
    <script src="https://kit.fontawesome.com/38351e3f15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark text-center " style="background-color:black;">
  <div class="container">
    <a class="navbar-brand" href="index">Enjed</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mt-2">
        <?php
        if(!isset($_SESSION['correo'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="login">Iniciar Sesion</a>
      </li>
  
      <?php
      }else{
        ?>
        <p class="nav-item">
          <p class="nav-link">Hola: <b><?php echo $nommbre; ?>    </b></p>
      </p>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../php/logout">Cerrar Sesion</a>
      </li>

        <?php
      }
      ?>
      </ul>
    </div>
  
  </div>
</nav> 
