$(document).ready(function() {
  load_data()
});

// agregar
jQuery(document).on('submit','#categoria_form', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  
  jQuery.ajax({
    url:'../php/actionadmin',
    type:'POST',
    dataType:'json',
    data:$(this).serialize(),
    beforeSend:function(){
      $('#agregar').val('Agreando....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            location.href="categoria";
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
jQuery(document).on('submit','#actualizar_categoria_form', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  jQuery.ajax({
    url:'../php/actionadmin',
    type:'POST',
    dataType:'json',
    data:$(this).serialize(),
    beforeSend:function(){
      $('#actualizando').val('Actualizando....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            location.href="categoria";
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
// funcion para traer los datos de categoria
  function load_data(query) {
    $.ajax({
        url: "../php/categorias",
        method: "post",
        data: {
          query: query,
      },
        success: function(data) {
            $('#result').html(data);
        }
    });
}