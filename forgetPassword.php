<?php
  ob_start();
   require_once ('inc/dbconnection.php');
  if(isset($_POST["forget-password"])){
	  if(!empty($_POST["user-email"])){
		  $email=trim($_POST["user-email"]);
	  }else{
		  $error_message = "<li>Email is required</li>";
	  }
	  if(empty($error_message)){
		  $query = $db->prepare("SELECT FirstName, email FROM users WHERE email=?");
		  $query->execute(array($email));
		  $user = $query->fetchAll(PDO::FETCH_ASSOC);
	  }
	  if(!empty($user)){
		  
		  //$msg="yes";
		 // echo "<script type='text/javascript'>alert('$msg');</script>";
		  require_once("forget-password-mail.php");
	  }else{
		  $error_message = 'no Email found';
	  }
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login/ Registration Form</title>
	<link href="css/style.css" rel="stylesheet"/>
  </head>
  <body>
     <div id ="wrapper">
	   <div id="loginContainer">
	     <form id="frmforget" name="frmforget" method="post">
		    <h3>Forget Password ?</h3>
			
			<?php if(!empty($success_message)){?>
			<div class="success_message"><?php echo $success_message;?></div>
			<?php } ?>
			
			<?php if(isset($error_message)){?>
			<div class="error_message"><?php echo $error_message;?></div>
			<?php } ?>
			
			<input type="email" name="user-email" placeholder="Enter a valid email" />
			
			<input type="submit" value="submit" name="forget-password" />
			
			
			
			
		 </form>
	   </div>
	 </div>
  </body>

</html>
