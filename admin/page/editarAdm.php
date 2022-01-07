<?php
require "../includes/menuadmin.php";

$id=$_GET['id'];

$correo = "";
$contrasena = "";
$tipo = "";
$query = "SELECT * FROM administradores where id='$id'";
$stmt1 = $conexion->prepare($query);
$stmt1->execute();
$result1 = $stmt1->get_result();

while ($row = $result1->fetch_assoc()) {
    $correo = $row['correo'];
    $contrasena = $row['contrasena'];
    $tipo = $row['tipo_usuario'];
}

 ?>

<div class="container">
  <div class="col-md-6 m-auto">
  <h3 class="mt-5 text-center">Editar Administrador</h3>
<form method="post" enctype="multipart/form-data" class="form" id="actualizar_administrador_form">
    <input type="hidden" class="form-control"  name="actualizarAdministrador" value="actualizarAdministrador">
    <input type="hidden" class="form-control"  name="id" value="<?php echo $id; ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control"  required name="correo" value="<?php echo $correo; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
    <input type="text" class="form-control"  required name="contrasena" value="">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tipo de usuario</label>
    <input type="text" class="form-control"  required name="tipo_usuario" value="<?php echo $tipo; ?>">
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
  
  <script src="../js/administradores.min.js"></script>