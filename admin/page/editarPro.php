<?php
require "../includes/menuadmin.php";

$id=$_GET['id'];

$nombre_producto="";
$foto="";
$color="";
$descuento="";
$cantidad="";
$tallas="";
$precio="";
$categoria="";
$descripcion_producto="";
$etiqueta="";

$query = "SELECT * FROM productos where id='$id'";
$stmt1 = $conexion->prepare($query);
$stmt1->execute();
$result1 = $stmt1->get_result();

while ($row = $result1->fetch_assoc()) {

  $nombre_producto= $row['nombre'];
  $color= $row['color'];
  $descuento= $row['descuento'];
  $cantidad= $row['cantidad'];
  $tallas= $row['talla'];
  $precio= $row['precio'];
  $categoria= $row['categoria'];
  $descripcion_producto= $row['descripcion'];
  $etiqueta= $row['etiqueta'];
  $foto= $row['foto'];
}

 ?>

<div class="container">
  <div class="col-md-6 m-auto">
  <h3 class="mt-5 text-center">Editar Producto</h3>
<form method="post" enctype="multipart/form-data" class="form" id="actualizar_producto_form">
    <input type="hidden" class="form-control"  name="actualizarProducto" value="actualizarProducto">
    <input type="hidden" class="form-control"  name="id" value="<?php echo $id; ?>">
    <input type="text" class="form-control"  name="imagen" value="<?php echo $foto; ?>">

  
  <img src="../../uploads/<?php echo $foto ?>" id="imgshow" class="img-fluid">
  <div class="col-md-4 mt-3">
    <label for="foto" class="form-group form label">Foto</label>
    <input type="file" name="foto" class="inputfile inputfile-2" accept="image/*" id="imgload" />
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control"  required name="nombre" value="<?php echo $nombre_producto; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Color</label>
    <input type="text" class="form-control"  required name="color" value="<?php echo $color; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descuento</label>
    <input type="number" class="form-control"  required name="descuento" value="<?php echo $descuento; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cantidad</label>
    <input type="number" class="form-control"  required name="cantidad" value="<?php echo $cantidad; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tallas</label>
    <input type="text" class="form-control"  required name="tallas" value="<?php echo $tallas; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio</label>
    <input type="text" class="form-control"  required name="precio" value="<?php echo $precio; ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select class="form-select" name="categoria" >
    <?php
        $query = "SELECT * FROM categoria order by nombre asc";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
        ?>
        <option  value="<?php echo $row['id_categoria']; ?>" 
        <?php
            if($categoria==$row['id_categoria']){
                echo "selected";
            }
        ?>
        >
            <?php echo $row['nombre']; ?></option>
        <?php
        } ?>
</select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
    <input type="text" class="form-control"  required name="descripcion_producto" value="<?php echo $descripcion_producto; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Etiqueta</label>
    <input type="text" class="form-control"  required name="etiqueta" value="<?php echo $etiqueta; ?>">
  </div>


    <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-success btn-block mt-3" id="actualizar" value="Actualizar"
            name="Actualizar">
    </div>
</form>
  </div>
  </div>
  
  <script src="../js/productos.min.js"></script>