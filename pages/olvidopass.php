<?php

require '../includes/menu.php';
if(isset($_SESSION['correo'])){
    header('location: index');
  }
?>
<div class="container" style="margin-top:8rem !important;" >
    <div class="col-md-6 m-auto mt-5">
        <?php
            require '../includes/olvido.form.php';
        ?>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
<script src="../js/olvido.min.js"></script>
