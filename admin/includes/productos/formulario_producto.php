


  <div class="col-md-6 m-auto">
  <h3 class="mt-5 text-center">Crea un nuevo producto</h3>
<form method="post" enctype="multipart/form-data" class="form" id="producto_form">
  <input type="hidden" class="form-control"  required name="product_insert">
  <div class="mb-3">
    <label class="form-label">Nombre producto</label>
    <input type="text" class="form-control"  required name="nombre_producto">
  </div>
  <div class="mb-3">
    <label class="form-label">Color</label>
    <input type="text" class="form-control"  required name="color">
  </div>
  <div class="mb-3">
    <label class="form-label">Descuento</label>
    <input type="number" class="form-control"  required name="descuento">
  </div>
  <div- class="mb-3">
    <label class="form-label">Cantidad</label>
    <input type="number" class="form-control"  required name="cantidad">
  </div->
  <div class="mb-3">
    <label class="form-label">Tallas</label>
    <input type="text" class="form-control"  required name="tallas">
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" class="form-control"  required name="precio">
  </div>
  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select class="form-select" name="categoria" id="selectCategorias" >
    <?php
        $query = "SELECT * FROM categoria order by nombre asc";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
        ?>
        <option  value="<?php echo $row['id_categoria']; ?>"  >
            <?php echo $row['nombre']; ?></option>
        <?php
        } ?>
</select>

  </div>
  <!--descripcion -->
  <div class="">
      <textarea name="descripcion_producto" id="" cols="30" required rows="3" class="form-control" placeholder="Descripcion del producto"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Etiqueta</label>
    <input type="text" class="form-control"  required name="etiqueta">
  </div>

  <div class="col-md-4 mt-3">
    <label for="foto" class="form-group form label">Foto</label>
    <input type="file" name="imagen" class="inputfile inputfile-2" accept="image/*" id="imgload"/>
  </div>
  <img src="../../img/icon.png" id="imgshow" class="img-fluid">
    <div class="alerts py-3 m-auto col-md-12">
        <div id="validacion" class="email text-center" role="alert">
        </div>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" class="btn btn-outline-primary btn-block" id="agregar" value="Agregar"
            name="agregar">
    </div>
</form>
</div>


