$(document).ready(function(){
	$("#signup").click(function(){
		$("#loginContainer").slideUp("slow",function(){
			
			$("#signupContainer").slideDown("slow");
		});
		
	});
	// on click signin it will hide register
	
	 $("#signin").click(function(){
		 $("#signupContainer").slideUp("slow",function(){
			 $("#loginContainer").slideDown("slow");
		 });
		 
	     }); 
   });




