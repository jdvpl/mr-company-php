function mostrarcontrasena() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function mostrarcontrasenaRe() {
    var y = document.getElementById("repetirpassword");
  
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }

jQuery(document).on('submit','#recupero', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  
  jQuery.ajax({
    url:'../php/action',
    type:'POST',
    dataType:'json',
    data:$(this).serialize(),
    beforeSend:function(){
      $('#agregar').val('Iniciando Sesion....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            location.href="index";
        }else{
            $('#agregar').val('Iniciar Sesion');
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