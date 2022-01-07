
$(document).ready(function () {
  load_data()
      $("#imgload").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgshow').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});


// agregar
jQuery(document).on('submit','#producto_form', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  jQuery.ajax({
    url:'../php/actionadmin',
    type:$(this).attr("method"),
    dataType:'json',
    data: new FormData(this),
    processData: false,
    contentType: false,
    beforeSend:function(){
      $('#agregar').val('Agreando....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            location.href="productos";
        }else{
            $('#agregar').val('Agregar');
            $(".email").addClass("alert alert-danger");
            valido.innerText = respuesta.tipo;
        }
  })
  .fail(function(res){
    valido.innerText = res.responseText;
        $(".email").addClass("alert alert-danger");  
  })
  .always(function(){
  });
  });

  // editart
jQuery(document).on('submit','#actualizar_producto_form', function(event){
  event.preventDefault();
  var valido = document.getElementById("validacion");
jQuery.ajax({
  url:'../php/actionadmin',
  type:$(this).attr("method"),
  dataType:'json',
  data: new FormData(this),
  processData: false,
  contentType: false,
  beforeSend:function(){
    $('#actualizar').val('Actualizando....');
  }
})
.done(function(respuesta){
      if(!respuesta.error){
          location.href="productos";
      }else{
          $('#actualizar').val('Actualizar');
          $(".email").addClass("alert alert-danger");
          valido.innerText = respuesta.tipo;
      }
})
.fail(function(res){
  valido.innerText = res.responseText;
      $(".email").addClass("alert alert-danger");  
})
.always(function(){
});
});
  // funcion para traer los datos de categoria
  function load_data(query) {
    $.ajax({
        url: "../php/productos",
        method: "post",
        data: {
          query: query,
      },
        success: function(data) {
            $('#result').html(data);
        }
    });
}

