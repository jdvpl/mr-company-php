

jQuery(document).on('submit','#olvido', function(event){
    event.preventDefault();
    var valido = document.getElementById("validacion");
  
  jQuery.ajax({
    url:'../php/action',
    type:'POST',
    dataType:'json',
    data:$(this).serialize(),
    beforeSend:function(){
      $('#agregar').val('Enviando correo....');
    }
  })
  .done(function(respuesta){
        if(!respuesta.error){
            $('#agregar').val('Correo enviado');
            $(".email").addClass("alert alert-success");
            valido.innerText = respuesta.tipo;
            location.href="recovery";
        }else{
            $('#agregar').val('Olvido contraseña');
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