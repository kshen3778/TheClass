/*function fpass() {
    alert("fpass function");
		$.ajax({
		   type: "POST",
		   url: 'forgotpass.php',
		   data: form.serialize()
		   success: function(data){
				//data returned from php
				console.log(data);
		   }
		});
}*/
function isValid(str){ //check a string for special characters
 return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}
$(document).ready(function() {
    $("#logintab").hide();
    $("#registrationtab").hide();
	
	//forgot password
	$("#forgotpass").on('click', function(){
		var username = document.getElementById('username').value;
		if(document.forms['form']['username'].value != ""){
			console.log("forgotpass function is running");
			$.ajax({
			   type: "POST",
			   url: 'forgotpass.php',
			   data: { name: username},
			   success: function(data){
					console.log(data);
			   }
			});
		}else{
			alert("Enter username first");
		}
    })
	$('#regaccount').on("click",function(){
        
			console.log("registration function is running");
			var username = document.getElementById('regusername').value;
			var password = document.getElementById('regpassword').value;
			var passwordcon = document.getElementById('regpasswordcon').value;
			var email = document.getElementById('regemail').value;
			var fname = document.getElementById('regfirstname').value;
			var lname = document.getElementById('reglastname').value;
			if(document.forms['form2']['regusername'].value != "" && document.forms['form2']['regpassword'].value != "" && document.forms['form2']['regpasswordcon'].value != "" && document.forms['form2']['regemail'].value != "" && document.forms['form2']['regfirstname'].value != "" && document.forms['form2']['reglastname'].value != ""){
				if(isValid(username)){
					if(password == passwordcon){
						console.log("password verified");
						$.ajax({
						   type: "POST",
						   url: 'register.php',
						   data: { regusername: username, regpassword: password, regemail: email, regfirstname: fname, reglastname: lname },
						   success: function(data){
								console.log(data);
						   }
						});
					}else{
						alert("Passwords dont match try again");
					}
				}else{
					alert("Your username shouldn't contain special characters");
				}
			}else{
				alert("Please fill in the information")
			}
		
        
        
    });
	
    
    $("#openlogin").on("click",function(){
        $("#openlogin").animate({ top: '+=100px'}, { duration: 500, queue: false });
        $("#openlogin").fadeTo(500, 0);
        $("#logintab").animate({ top: '+=200px'}, { duration: 500, queue: false });
        $("#logintab").fadeTo(500, 1);
        $("#register").hide();
    });
    
        $("#register").on("click",function(){
        $("#register").animate({ top: '+=100px'}, { duration: 500, queue: false });
        $("#register").fadeTo(500, 0);
        $("#registrationtab").animate({ top: '+=200px'}, { duration: 500, queue: false });
        $("#registrationtab").fadeTo(500, 1);
        $("#openlogin").fadeTo(500, 0);
    });
    $("#closetablog").on("click",function(){
        $("#logintab").animate({ top: '+100px' }, { duration: 500, queue: false });
        $("#logintab").fadeTo(500, 0,function(){
        $("#logintab").hide();
        });
        $("#openlogin").animate({ top: '+400px' }, { duration: 500, queue: false });
        $("#openlogin").fadeTo(500, 1,function(){
            $("#register").fadeTo(500, 1);
        });
    });
    $("#closetabreg").on("click",function(){
        $("#registrationtab").animate({ top: '+100px'}, { duration: 500, queue: false });
        $("#registrationtab").fadeTo(500, 0,function(){
        $("#registrationtab").hide();
        });
        $("#register").animate({ top: '+440px'}, { duration: 500, queue: false });
        $("#register").fadeTo(500, 1,function(){
        $("#openlogin").fadeTo(500, 1);
        });
    });
});