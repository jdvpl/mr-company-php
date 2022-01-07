<h4 class="text-center">Iniciar Sesion</h4>
<form method="post" enctype="multipart/form-data" class="form" id="login">

<input type="hidden" name="login">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" required name="email">
  </div>
  <!--password -->
  <div class="">
        <label class="form-group form label" id="labelpass">Contraseña</label>
        <div class="input-group">
            <input type="password" class="form-control" name="password" id="password" minlength="6" required>
            <div class="input-group-append">
                <span class="input-group-text" style="height: calc(1.5em + .75rem + 2px);">
                    <label class="check-text">
                        <input type='checkbox' onclick="mostrarcontrasena()">
                        <span class="glyphicon glyphicon-eye-open checked ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg>
                        </span>
                        <span class="glyphicon glyphicon-eye-close unchecked">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                <path
                                    d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                <path
                                    d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                            </svg>
                        </span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-primary btn-block mt-3" id="agregar" value="Iniciar Sesion"
            name="agregar">
    </div>
</form>
<div class="text-center my-3">¿Aun no tienes cuenta? <b><a href="../pages/registro">Registrate</a></b></div>
<div class="text-center my-3">¿Olvidaste tu contraseña? <b><a href="../pages/olvidopass">Aqui</a></b></div>