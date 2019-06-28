<!DOCTYPE html>
<html>
 <head>
   <title>Login / Registration Form</title>
   <link rel="stylesheet" href="css/style.css"/>
 </head>
 <body>
  <div id="wrapper">
     <!-- craete first div for Login form-->
	 <div id="loginContainer">
	  <form id="loginForm" method="post">
	    <h3>Members login page</h3>
		<div class="display_error" style="diplay:none;"></div>
		<input type="text" name="lemail" placeholder="enter a valid email"  autocomplete="email"  />
	    <input type="password" name="lpass" placeholder="enter a valid password" autocomplete="current-password" />
		<input type="submit" name="login" value="login" />
		<p><a href="forgetPassword.php" >Forget Password</a></p>
		<p id="bottom">Don't have account yet?<a href="#" id="signup">Register here</a></p>
	  </form>
	 </div>
	 <!-- end div-->
	 <div id="signupContainer">
	   <form id="registfrm" method="post">
	      <h3>New Members Register</h3>
		  <div class="display_error" style="diplay:none;"></div>
	     <input type="text" name="rfname" placeholder="FirstName.." autocomplete="username"/>
		  <input type="text" name="rlname" placeholder="LastName.."  autocomplete="lastname " />
		   <input type="text" name="remail" placeholder="Enter your correct email.."autocomplete="email"/>
		    <input type="text" name="rphone" maxlength="10"  pattern="[0-9]{10}" placeholder="Enter your mobile number.." autocomplete="number"/>
			 <input type="password" name="rpass" placeholder="Enter your password..." autocomplete="current-password" />
			  <input type="submit"  value="Create your account"/>
			   <p id="bottom">Already have an account?<a href="#" id="signin">Login</a></p>
	   </form>
	 </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <script>
     $(document).ready(function(){
		 $("#loginForm").submit(function(){
			var data=$("#loginForm").serialize();
			checkRecords(data);
			return false;
		 });
		 function checkRecords(data){
			 $.ajax({
				 url:'loginProcess.php',
				 data:data,
				 type:'POST',
				 dataType:'json',
				 success:function(data){
					 if(data.code == 200){
						 alert('you have successfully login');
						 window.location='dashboard.php';
					 }
						 else{
							 $(".display_error").html("<ul>"+data.msg+"</ul>");
							 $(".diplay_error").css("diplay","block");
						 }
					 },
					 error: function(){
						 alert("operation failed");
					 }
				 });
			 }
		 
	 });
  
  </script>
  <!-- sign up form-->
  <script>
     $(document).ready(function(){
		 $("#registfrm").submit(function(){
			var data=$("#registfrm").serialize();
			signupRecords(data);
			return false;
		 });
		 function signupRecords(data){
			 $.ajax({
				 url:'signupProcess.php',
				 data:data,
				 type:'POST',
				 dataType:'json',
				 success:function(data){
					 if(data.code == 200){
						 alert('you have successfully register \n please login now');
						 setTimeout(function(){
							 location.reload();
						 },1000);
						 window.location='dashboard.php';
					 }
						 else{
							 $(".display_error").html("<ul>"+data.msg+"</ul>");
							 $(".diplay_error").css("diplay","block");
						 }
					 },
					 error: function(jqXHR,exception){
						 console.log(jqXHR);
					 }
				 });
			 }
		 
	 });
  
  </script>
  
 </body>
</html>



