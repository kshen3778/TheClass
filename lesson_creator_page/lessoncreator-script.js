var toggleshowprofile = false;
$(document).ready(function() {
//navbar js
    $("#navprofile").on("click",function(){
        if(toggleshowprofile==true){
            $("#profilesettingcon").animate({left: "+=200px"});
            toggleshowprofile=false;
        }
        else{
            $("#profilesettingcon").animate({left: "-=200px"});
            toggleshowprofile = true;
        }
    });
	
	//click to go to profile page
	/*$("#accountsettings").on("click",function(){
         //redirect to account settings/profile page
    });*/
	
	//logout: call logout script
	$("#logout").on('click', function(){
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
	
    $("#createpopupbox").hide();
    /*$("#create").on("click",function(){
        $("#htmlpage").fadeTo(500,0.5);
        $("#navbar").fadeTo(500,0.5);
        $("#navbarinfo").fadeTo(500,0.5);
        $("#htmlpage").css("top","-208px");
        $("#navbarinfo").css("top","-208px")
        $("#createpopupbox").fadeIn();
        $("#htmlpage").css("z-index","-1");
        $("#navbar").css("z-index","-1");
        $("#navbarinfo").css("z-index","-1");
        //$('html, body').animate({ scrollTop: 0 }, 'fast');
    });
    $("#closecreate").on("click",function(){
        $("#htmlpage").fadeTo(500,1);
        $("#navbar").fadeTo(500,1);
        $("#navbarinfo").fadeTo(500,1);
        $("#createpopupbox").fadeOut(function(){
            $("#htmlpage").css("top","-8px");
            $("#navbarinfo").css("top","-8px");
            $("#htmlpage").css("z-index","0");
            $("#navbar").css("z-index","1");
            $("#navbarinfo").css("z-index","1");
        });
    });*/
    //end of navbar js
//code for insert supporting content
    $("#submitsupportingcontent").on("click",function(){
        $("#uploadsupportingcontent").click();
    });
    //for when the user uloads supporting content or"video"
    $("#uploadsupportingcontent").change(function(){
        //check to see if file extensions are valid
        var ext = $('#uploadsupportingcontent').val().split('.').pop().toLowerCase();
			//var ext = filename.split('.').pop().toLowerCase();
			var wrongext = false;
			if($.inArray(ext, ['gif','png','jpg','jpeg','pptx','docx','xlsm']) == -1 ) {
				alert("Sorry you can't upload files of this type :(");
				wrongext = true;
			}
            //submitting and clicking php script when user uploaded correct ext
            if(wrongext == false){
				$("#confirmresource").click();
                alert("hi");
			}
        
        
        
    });
    $("#writenlecture").keyup(function(){
        if($("#writenlecture").val()!==0){
            $("#insertreading").hide();
        }
        if($("#writenlecture").val()==0){
            $("#insertreading").show();    
        }
    });
    
    //code for insertreading
    $("#insertreading").on("click",function(){
        $("#uploadreading").click();
    });
    $("#uploadreading").change(function(){
        //check to see if file extensions are valid
        var ext = $('#uploadreading').val().split('.').pop().toLowerCase();
			//var ext = filename.split('.').pop().toLowerCase();
			var wrongext = false;
			if($.inArray(ext, ['gif','png','jpg','jpeg','pptx','docx','xlsm']) == -1 ) {
				alert("Sorry you can't upload files of this type :(");
				wrongext = true;
			}
            //submitting and clicking php script when user uploaded correct ext
            if(wrongext == false){
				$("#confirmreading").click();
                alert("hi");
                $("#writenlecture").hide();
			}
        
        
        
    });
    
    
    
    });