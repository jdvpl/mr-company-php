<div class="container">
<div class="row">
  <div class="col-md-6">
  <h3 class="mt-5 text-center">Crea un administrador</h3>
<form method="post" enctype="multipart/form-data" class="form" id="administradores_form">
  <input type="hidden" class="form-control"  required name="administradores_insert">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control"  required name="correo">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
    <input type="password" class="form-control"  required name="contrasena">
  </div> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tipo</label>
    <input type="text" class="form-control"  required name="tipo_usuario">
  </div> 
    <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-primary btn-block mt-3" id="agregar" value="Agregar"
            name="agregar">
    </div>
</form>
  </div>