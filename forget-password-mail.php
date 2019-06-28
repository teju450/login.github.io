<?php
require_once 'vendor/autoload.php';
define("PROJECT_NAME","http://localhost/test/");
$mail= new PHPMailer\PHPMailer\PHPMailer;

$mail->SMTPDebug = 0;

$mail->IsSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth= true;

$mail->Username ="tejashrijadhav14@gmail.com";
$mail->Password ="tejashriN14@";
$mail->SMTPSecure="tls";
$mail->Port =587;

$mail->From="admin@webtuts.com";
$mail->FromName="tejashri jadhav";
$mail->addAddress($_POST["user-email"]);
$mail->IsHTML(true);

$mail->Subject ="Forget password";
$mail->Body.="<div>".$user[0]["FirstName"]."<br><p> click here to recover your password<br>
           <a href='".PROJECT_NAME."resetPassword.php?FirstName=".$user[0]["FirstName"]."'>".PROJECT_NAME.
              "resetPassword.php?FirstName=".$user[0]["FirstName"]."</a><br></p>Regards<br>admin.</div>";

      if(!$mail->send()){
		  $error_message = "Mailer Error:".$mail->ErrorInfo;
	  }else{
		  $success_message ="msg send successfully";
	  }












?>
