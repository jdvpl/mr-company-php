$(document).ready(function() {
  load_data()
});

// agregar
jQuery(document).on('submit','#administradores_form', function(event){
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
            location.href="administradores";
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
jQuery(document).on('submit','#actualizar_administrador_form', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  jQuery.ajax({
    url:'../php/actionadmin',
    type:'POST',
    dataType:'json',
    data:$(this).serialize(),
    beforeSend:function(){
      $('#actualizar').val('Actualizando....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            location.href="administradores";
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
        url: "../php/administradores",
        method: "post",
        data: {
          query: query,
      },
        success: function(data) {
            $('#result').html(data);
        }
    });
}