<?php
/*$conn=mysqli_connect('localhost','root','','project');
	if(!$conn){
		echo "Error in connection";
	}*/
	
	
	
	$db= new PDO('mysql:host=localhost;dbname=project; charset=utf8mb4','root','',
	array(PDO::ATTR_EMULATE_PREPARES => false,
	PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
	
	
	
?>


