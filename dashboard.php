<?php
 ob_start();
 session_start();
 require_once('inc/dbconnection.php');
 
  if(isset($_SESSION)&& $_SESSION["email"]){
	  echo '<a href="logout.php"><span calss="glyphicon glyphicon-log-out">Signout</span></a>';
	  echo"<br>";
	  echo "Hello  " .$_SESSION['email']."<br>";
  }else{
	  header("Location:index.php");
  }



?>
