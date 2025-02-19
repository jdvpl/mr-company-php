$(document).ready(function () {
  load_data()
});
  // funcion para traer los datos de categoria
  function load_data(query) {
    $.ajax({
        url: "../php/productos.php",
        method: "post",
        data: {
        query: query,
    },
        success: function(data) {
            $('#result').html(data);
        }
    });
}

function addFavorite(id){
    var id=id;
    var item = document.getElementById("fav"+id);
    var favorito = item.classList.contains('favorito');
    if(favorito){
    var tipo="agregar";
    $.ajax({
        url:'../php/likes',
        type:"post",
        dataType:'json',
        data: {id:id, tipo:tipo},
        success: function(respuesta){
            if(!respuesta.error){
                $("#fav"+id).addClass("btn-danger removefavorito");
                $("#fav"+id).removeClass("btn-outline-danger favorito");
            }
        }
    });
    }else{
        var tipo="eliminar";
    $.ajax({
        url:'../php/likes',
        type:"post",
        dataType:'json',
        data: {id:id, tipo:tipo},
        success: function(respuesta){
            if(!respuesta.error){
                $("#fav"+id).removeClass("btn-danger removefavorito");
                $("#fav"+id).addClass("btn-outline-danger favorito");
            }
        }
    });
    }

}


    



