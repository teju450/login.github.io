<?php
 require_once 'inc/dbconnection.php';
 if(isset($_POST["reset-password"])){
	 $name= $_GET["FirstName"];
	 $password=trim($_POST["password"]);
	 $confirmPassword=trim($_POST["confirmpassword"]);
	  if($password==$confirmPassword){
		  $password = password_hash($password,PASSWORD_DEFAULT);
		  $stmt=$db->prepare("UPDATE users SET password= ? WHERE FirstName= ?");
		  $stmt->execute(array($password,$name));
		  $affected_rows = $stmt->rowCount();
		   if($affected_rows){
			   
			   $success_message = "password is reset successfully.<br> Now you are reconnected";
			   header("Refresh:3; url=index.php");
		   }else{
			   $error_message = "Failed:<br> password not updated";
		   }
		  
	  }else{
		  $error_message = "password not matched";
	  }
 }




?>
<!DOCTYPE html>
<html>
<head>
 <title>Reset Password</title>
 <link href="css/style.css">
</head>
<body>
  <div id="loginContainer">
      <form id="resetPassword" name="resetPassword" method="post">
	  <h3>ResetPasword</h3>
	  <?php if(!empty($success_message)){?>
			<div class="success_message"><?php echo $success_message;?></div>
			<?php } ?>
			
			<?php if(!empty($error_message)){?>
			<div class="error_message"><?php echo $error_message;?></div>
			<?php } ?>
			
	  <input type="password" id="password" name="password" placeholder="Enter New Password" required />
	   <input type="password" id="confirmpassword" name="confirmpassword" placeholder="confirm new Password" required />
	   <input type="submit" name="reset-password" value="reset-password" id="reset-password"/>
	  </form>
  </div>
</body>

</html>
