<?php
 ob_start();
 require_once('inc/dbconnection.php');
 require_once('inc/function.php');
 
 $errorMsg="";
 $rfname= trim($_POST["rfname"]);
 $rlname= trim($_POST["rlname"]);
 $remail= trim($_POST["remail"]);
 $rphone= trim($_POST["rphone"]);
 $rpass= trim($_POST["rpass"]);
      if(empty($rfname)){
		  $errorMsg .="<li>FirstName is Requried</li>";
	  }else{
		  $rfname=$rfname;
	  }
        if(empty($rlname)){
		  $errorMsg .="<li>lastName is Requried</li>";
	  }else{
		  $rlname=$rlname;
	  }
	  if(empty($remail)){
		  $errorMsg .="<li>email is Requried</li>";
	  }else{
		  $remail=filterEmail($remail);
		  if($remail==FALSE){
			  $errorMsg .="<li>invalid email format</li>";
		  }
	  }
	  if(empty($rpass)){
		  $errorMsg .="<li>password is Requried</li>";
	  }else{
		  $rpass=password_hash($rpass,PASSWORD_DEFAULT);
	  }
      if(empty($rphone)){
		  $errorMsg .="<li>phone number is Requried</li>";
	  }else{
		  $rphone=$rphone;
	  }
	  if(empty($errorMsg)){
		  $qry=$db->prepare("SELECT email FROM users WHERE email=?");
		  $qry->bindparam(1,$email);
		  $qry->execute();
		   
		    if($qry->rowCount()>0){
				echo json_encode(['code'=>400,'msg'=>'Email already exits']);
				exit;
			}else{
				$stmt= $db->prepare("INSERT INTO users(FirstName,LastName,email,password,mobile) VALUES (:fname,:lname,:email,:password,:mobile)");
				$stmt->execute(array(':fname'=>$rfname,':lname'=>$rlname,':email'=>$remail,':password'=>$rpass,':mobile'=>$rphone));
				$affected_rows=$stmt->rowCount();
				if($affected_rows == 1){
					echo json_encode(['code'=>200,'msg'=>'successfully register']);
					exit;
				}else{
					echo json_encode(['code'=>400]);
					exit;
					
				}
			}
	  }else{
		  echo json_encode(['code'=>404,'msg'=>$errorMsg]);
	  }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
?>
