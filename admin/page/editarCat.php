<?php
require "../includes/menuadmin.php";

$cat=$_GET['cat'];

$nommbre = "";
$descp = "";
$query = "SELECT * FROM categoria where id_categoria='$cat'";
$stmt1 = $conexion->prepare($query);
$stmt1->execute();
$result1 = $stmt1->get_result();

while ($row = $result1->fetch_assoc()) {
    $nommbre = $row['nombre'];
    $descp = $row['descripcion'];
}

 ?>

<div class="container">
  <div class="col-md-6 m-auto">
  <h3 class="mt-5 text-center">Editar Categoria</h3>
<form method="post" enctype="multipart/form-data" class="form" id="actualizar_categoria_form">
    <input type="hidden" class="form-control"  name="actualizarCategoria" value="actualizarCategoria">
    <input type="hidden" class="form-control"  name="id_categoria" value="<?php echo $cat; ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre categoria</label>
    <input type="text" class="form-control"  required name="nombre" value="<?php echo $nommbre; ?>">
  </div>
  <!--descripcion -->
  <div class="">
      <textarea name="descripcion_categoria" id="" cols="30" required rows="3" class="form-control" placeholder="Descripcion de la categoria"><?php echo $descp; ?></textarea>
  </div>
    <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-success btn-block mt-3" id="agregar" value="Actualizar"
            name="Actualizar">
    </div>
</form>
  </div>
  </div>
  
  <script src="../js/categoria.min.js"></script>