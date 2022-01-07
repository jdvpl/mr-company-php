<?php

require '../env/variable.php';
require '../includes/menu.php';
require '../php/PHPMailer/Exception.php';
require '../php/PHPMailer/PHPMailer.php';
require '../php/PHPMailer/SMTP.php';

// configuracion para smtp
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!$_SESSION['hash']) {
    header("location: login");
}
if (!$_SESSION['email']) {
    header("location: login");
}
$hash = $_SESSION['hash'];
$correo = $_SESSION['email'];
$oMail = new PHPMailer();
$oMail->CharSet = "UTF-8";

$oMail->isSMTP();
$oMail->Host = "smtp.gmail.com";
$oMail->Port = 587;
$oMail->SMTPSecure = "tls";
$oMail->SMTPAuth = true;
$oMail->Username = "mercafaci@gmail.com";
$oMail->Password = "zlphxvjhcoujeavg";
$oMail->setFrom("mercafaci@gmail.com", "Recuperacion de la cuenta");

?>
        

 
        <div class="p-5 mb-4 bg-light rounded-3 container" style="margin-top:2rem;">
      <div class="container py-5">
        <h1 class="display-5 fw-bold">Recuperacion de cuenta</h1>
        <p class="col-md-12 fs-4">Al correo <b ><?php echo $correo; ?></b> se enviaron las indicaciones para recuperar tu contraseña</p>
      </div>
    </div>


<?php



$message = "


<div>

<h1>Recuperacion de contraseña</h1>
        Por favor dar cick en el siguiente enace para recuperar tu cuenta <a href='$host/update.php?email=$correo&hash=$hash'>aqui</a>
</div>

";


// enviar correo cobn smtp
$oMail->addAddress($correo, "");
$oMail->Subject = "Recuperacion de la cuenta";
$oMail->msgHTML($message);

$oMail->send();


require '../includes/footer.php';
// no olvidar descomentar estar parte
session_destroy();

?>
