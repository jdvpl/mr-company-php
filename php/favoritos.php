<?php
require '../env/conexion.php';
session_start();

$id_user="";


if(isset($_SESSION['correo'])){
  $id_user=$_SESSION["id_user"];
}

 $name="Cat";
 $$name="Dog";
 echo $name."<br/>";
 echo $$name."<br/>";
 echo $Cat;
$output = '';
$query="SELECT productos.nombre, productos.id, productos.foto,productos.precio,productos.descuento,productos.color,productos.descripcion, favoritos.id_producto, favoritos.id_favorito, favoritos.fecha, favoritos.id_user, DATE(favoritos.fecha) AS fecha, TIME(favoritos.fecha) AS hora FROM productos INNER JOIN favoritos ON favoritos.id_producto=productos.id WHERE favoritos.id_user='$id_user'";

$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $output .= '
    <div class="container row m-auto my-5">
';
$numero = 0;

while ($row = mysqli_fetch_array($result)) {

$numero = $numero + 1;
$uno=1;
$clase="favorito";
$output .= '

<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../uploads/'.$row["foto"].'" height="150" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">' . $row["nombre"] . '</h5>
        <p class="card-text">
          <p> <b>$ '.(($uno-($row["descuento"]/100))* $row["precio"]) . '</b> </p>

          ' . $row["descripcion"] . '
        </p>
        <p class="card-text"><small class="text-muted">Agregado el ' . $row["fecha"] . ' a las ' . $row["hora"] . '</small> 
        <a id="fav'.$row['id'] .'" 
        onclick="addFavorite('.$row["id"].')"
        class="text-danger removefavorito"
            style="cursor:pointer;" style="text-decoration:none;">
            Eliminar
        </a>
        </p>
        

      </div>
    </div>
  </div>
</div>

';
}
$output .="
</div>";
}else{
  $output .="<h4 class='text-center mt-4' style='min-height:50vh;'>No tienes favoritos</h4>";

}
echo $output;
