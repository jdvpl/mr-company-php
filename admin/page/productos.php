<?php
    require "../includes/menuadmin.php";
?>
<?php require '../includes/productos/formulario_producto.php'; ?>

<div id="result" ></div>


<script src="../js/productos.min.js"></script>

<script src="../js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>