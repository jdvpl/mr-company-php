<?php
require '../../env/conexion.php';
require 'archivo_session.php';

$output = '';
$query="SELECT productos.id,productos.nombre,productos.foto,productos.color,productos.descuento,productos.cantidad,productos.talla,productos.precio,productos.descripcion,productos.etiqueta, categoria.nombre as cat from productos INNER JOIN categoria ON categoria.id_categoria=productos.categoria";
$result = mysqli_query($conexion, $query);
$tabla="productos";
$field_id="id";
if (mysqli_num_rows($result) > 0) {
    $output .= '
    <h2 class="text-center">Productos</h2>
    <div class="row">
';
$numero = 0;
while ($row = mysqli_fetch_array($result)) {
$numero = $numero + 1;
$uno=1;
$output .= '
<div class="col-md-3">
<div class="card mb-3">
  <img src="../../uploads/'.$row["foto"].'" class="card-img-top" alt="..." height="320" width="200">
  <div class="card-body">
    <h5 class="card-title"><b>Nombre:</b> ' . $row["nombre"] . '</h5>
    <p> <b>Color:</b> ' . $row["color"] . '</p>
    <p> <b>Tallas:</b> ' . $row["talla"] . '</p>
    <p> <b>Categoria:</b> ' . $row["cat"] . '</p>
    <p> <b>Precio:</b> ' . $row["precio"] . '</p>
    <p> <b>Descuento:</b> ' . $row["descuento"] . '% </p>
    <p> <b>Precio a pagar:</b> '.(($uno-($row["descuento"]/100))* $row["precio"]) . ' </p>
    <p> <b>Cantidad:</b> ' . $row["cantidad"] . ' </p>
    <p> ' . $row["descripcion"] . ' </p>
    <div class="row">
        <div class="col-md-6">
            <a href="../php/borrar?id='.$row["id"] .'&table='.$tabla.'&field_id='.$field_id.'" class="btn btn-outline-danger p-1" onclick=\'return confirm("Realmente quieres eliminar esta categoria?");\'><i class="fa fa-trash" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-6">
            <a href="editarPro?id='.$row['id'] .'" class="btn btn-outline-success"><i class="fas fa-edit"></i></a>
        </div>
    </div>
  </div>
</div>
</div>


';
}
$output .="</div>";
echo $output;
} 