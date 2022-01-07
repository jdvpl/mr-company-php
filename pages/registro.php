<?php

require '../includes/menu.php';
if(isset($_SESSION['correo'])){
    header('location: index');
  }
?>
<div class="container" style="margin-top:8rem !important;">
    <div class="col-md-6 m-auto mt-5">
        <?php
            require '../includes/register.form.php';
        ?>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
<script src="../js/registro.min.js"></script>
