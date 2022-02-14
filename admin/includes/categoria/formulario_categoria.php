<div class="container">
<div class="row">
  <div class="col-md-6">
  <h3 class="mt-5 text-center">Crea una nueva categoria</h3>
<form method="post" enctype="multipart/form-data" class="form" id="categoria_form">
  <input type="hidden" class="form-control"  required name="categoria_insert">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre categoria</label>
    <input type="text" class="form-control"  required name="categoria">
  </div>
  <!--descripcion -->
  <div class="">
      <textarea name="descripcion_categoria" id="editor" cols="30" required rows="3" class="form-control" placeholder="Descripcion de la categoria"></textarea>
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


