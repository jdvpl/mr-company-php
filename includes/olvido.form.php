<h4 class="text-center">¿Ovido su contraseña?</h4>
<p class="px-1 mt-2">Para reajustar su contraseña, envíe su dirección de correo
        electrónico.
        Asi podemos encontrarlo en la base de datos, le enviaremos un email con instrucciones para poder
        acceder de nuevo.
    </p>
<form method="post" enctype="multipart/form-data" class="form" id="olvido">
<input type="hidden" name="olvido">
  <div class="">
    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" required name="email">
  </div>
  <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-primary btn-block mb-3" id="agregar" value="Recuperar Contraseña"
            name="agregar">
    </div>
</form>