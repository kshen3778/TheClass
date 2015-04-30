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
$(document).ready(function() {
    $("#logintab").hide();
    $("#registrationtab").hide();
	
	//forgot password
	$("#forgotpass").on('click', function(){
		var username = document.getElementById('username').value;
		console.log("forgotpass function is running");
		$.ajax({
		   type: "POST",
		   url: 'forgotpass.php',
		   data: { name: username},
		   success: function(data){
				console.log(data);
		   }
		});
    })
	
	
    
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