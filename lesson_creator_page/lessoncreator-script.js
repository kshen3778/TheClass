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
	//code for insert lecture
    $("#submitlecture").on("click",function(){
        $("#uploadlecture").click();
    });
    //for when the user uploads supporting content or"video"
    $("#uploadlecture").change(function(){
        //check to see if file extensions are valid
        var ext = $('#uploadlecture').val().split('.').pop().toLowerCase();
			//var ext = filename.split('.').pop().toLowerCase();
			var wrongext = false;
			if($.inArray(ext, ['gif','png','jpg','jpeg','pptx','docx', 'ppt']) == -1 ) {
				alert("Sorry you can't upload files of this type :(");
				wrongext = true;
			}
		//check if extension is powerpoint
        /*if(ext=="pptx" || ext=="ppt"){
            $("#submitlecture").hide();
            $("#submitlecturecon").append('<img id="lectureimage" src="Microsoft_PowerPoint_2013_logo.png">');
        }*/
        
        
    });
	
	//making sure they either upload or use text
    $("#writtenreading").keyup(function(){
        if($("#writtenreading").val()!==0){
            $("#insertreading").hide();
        }
        if($("#writtenreading").val()==0){
            $("#insertreading").show();    
        }
    });
    
    //code for insertreading
    $("#insertreading").on("click",function(){
        if($("#writtenreading").val()==0){
            $("#uploadreading").click();
        }
        else{
            alert("nice try. But you still can't upload 2 files at once :)");
            $("#insertreading").hide();
        }
    });
    $("#uploadreading").change(function(){
        //check to see if file extensions are valid
        var ext = $('#uploadreading').val().split('.').pop().toLowerCase();
			//var ext = filename.split('.').pop().toLowerCase();
			var wrongext = false;
			if($.inArray(ext, ['pdf','docx','pages']) == -1 ) {
				alert("Sorry you can't upload files of this type :(");
				wrongext = true;
			}
    });
	
	//Submit changes
	$("#submitchanges").on("click",function(){
		//Save information to datafile
        var title = $("#lessontitle").val();
		var desc = $("#lessondescription").val();
		
		
		//lecture
		var lecture = $('#uploadlecture').val();
		//var myFile = $('#fileToUpload1').prop('files');
		//alert(lecture);
		var lecturename = "";
		if(lecture != "" || lecture != null){
			lecturename = lecture.split("\\").pop(); //take the last element which is the filename
			
		}else{
			alert("You need to upload a file");
		}
		
		//text and reading
		var reading = $('#uploadreading').val();
		//alert(reading);
		var readingname = "";
		//supporting reading isn't necessary but in the future check if the textbox has content
		readingname = reading.split("\\").pop(); //take the last element which is the filename
	
		$.ajax({
			type: "POST",
			url: 'copydata.php',
			data: { title: title, desc: desc, lecture: lecturename, reading: readingname },
			success: function(data){
				console.log(data);
			}
		});
		
		
    });
	
    $("#submitchanges").on("click",function(){
		//Upload files
		//var formData = new FormData(document.getElementById("confirmresourceandreadingform"));
		//formData.append('lecture', $('#uploadlecture')[0].files[0]);
		/*$.ajax({
			type: 'POST',
			url: 'upload.php',
			contentType: false, 
			processData: false,
			data: formData,
			 success: function (data) {
			   console.log(data);
			 }
		});*/
		jQuery.AjaxFileUpload({
            url             : "upload.php",
            secureurl       : false,
            fileElementId   : "fileToUpload1",
            dataType        : 'json',
            data            : {
               // if you have another data to pass in your phhp     
            },
            success : function ()
            {
				console.log("Success");
             },
            error  : function(){

            }
        });
	});
    
    
    });