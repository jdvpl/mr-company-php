<?php
require '../includes/menu.php';
if(!isset($_GET['email'])){
    header('location: index');
}
if(!isset($_GET['hash'])){
    header('location: index');
}
$correo=$_GET['email'];
$hash=$_GET['hash'];


$query = "SELECT * FROM clientes where correo='$correo' and hash='$hash'";
$resultado = $conexion->query($query);

if ($resultado->num_rows == 0) {
    header('location: index');
}


?>
<div class="container" style="margin-top:8rem !important;" >
    <div class="col-md-6 m-auto mt-5">
        <?php
            require '../includes/update.form.php';

        ?>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
<script src="../js/recupero.min.js"></script>
