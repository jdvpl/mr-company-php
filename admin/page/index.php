
<?php
    
    require "../includes/menu.php";
    session_start();
    if(isset($_SESSION['email'])){
      header('location: admin');
    }
    ?>
<div class="container col-md-6 m-auto mt-5">
  <?php
    require "../includes/login.form.php";
   
  ?>
</div>

<?php
require "../../includes/footer.php";
?>
<script src="../js/login.min.js"></script>


