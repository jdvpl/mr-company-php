
<?php
    require "../includes/menu.php";

    if(!isset($_SESSION["correo"])){
      header("location: index");
    }
    ?>
<div class="container">
  <?php
    require "../includes/favoritos.php";
  ?>
</div>
<?php
require "../includes/footer.php";
?>
<script src="../js/favoritos.min.js"></script>
