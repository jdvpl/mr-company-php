
<?php
    require "../includes/menu.php";
    require "../php/config.php";

    echo $_GET["id"];
    ?>
<div class="container">
  <?php
    require "../includes/favoritos.php";
  ?>
</div>
<?php
require "../includes/footer.php";
?>
<script src="<?php echo $server; ?>js/favoritos.min.js"></script>
