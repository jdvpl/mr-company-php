<?php
require '../env/conexion.php';
session_start();

$id_user="";

if(isset($_SESSION['correo'])){
  $id_user=$_SESSION["id_user"];
  $queryfavoritos="SELECT * FROM favoritos where id_user='$id_user'";
  $resultadofav = mysqli_query($conexion, $queryfavoritos);
  $infoFav=array();
  while ($row2 = mysqli_fetch_array($resultadofav)) {
    array_push($infoFav, $row2["id_producto"]);
  }
}
$output = '';

$query="SELECT productos.id,productos.nombre,productos.foto,productos.color,productos.descuento,productos.cantidad,productos.talla,productos.precio,productos.descripcion,productos.etiqueta, categoria.nombre as cat from productos INNER JOIN categoria ON categoria.id_categoria=productos.categoria";

$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $output .= '
    <div class="row m-auto my-5">
';
$numero = 0;

while ($row = mysqli_fetch_array($result)) {

$numero = $numero + 1;
$uno=1;
$clase="favorito";
$output .= '
<div class="col-md-3" onClick="window.open(\'detalle/'.$row['id'].'/\')">
  <img src="../uploads/'.$row["foto"].'" class="card-img-top w-100" alt="..." >
  <div class="card-body">
  <p> <b>$ '.(($uno-($row["descuento"]/100))* $row["precio"]) . '</b> </p>
    <div class="row" style="margin-left:0;">
    <div class="col-md-10 col-10">
      <h5 class="card-title "> ' . $row["nombre"] . ' </h5>
    </div>

  '.(isset($_SESSION['correo']) ?
    '<div class="col-md-2 col-2">
      <button  id="fav'.$row['id'] .'" 
      onclick="addFavorite('.$row["id"].')"
      class="btn '.(in_array($row["id"],$infoFav) ? 'btn-danger removefavorito':'btn-outline-danger favorito' ).'"
          style="cursor:pointer;">
          <i class="fas fa-heart" ></i>
      </button >
    </div>' 
  : '').'

    </div>
  </div>
</div>
';
}
}
$output .="</div>";
echo $output;
