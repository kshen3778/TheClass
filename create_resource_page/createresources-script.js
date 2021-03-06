function fetchJSONFile(path, callback) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                var data = JSON.parse(httpRequest.responseText);
                if (callback) callback(data);
            }
        }
    };
    httpRequest.open('GET', path);
    httpRequest.send(); 
}

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
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
    $("#closecreate").on("click",function(){
        $("#htmlpage").fadeTo(500,1);
        $("#navbar").fadeTo(500,1);
        $("#navbarinfo").fadeTo(500,1);
        $("#createpopupbox").fadeOut(function(){
            $("#htmlpage").css("top", "-8px");
            $("#navbarinfo").css("top", "-8px");
            $("#htmlpage").css("z-index", "0");
            $("#navbar").css("z-index", "1");
            $("#navbarinfo").css("z-index", "1");
        });
    });*/
    //end of navbar js
    $("#addcircle").on("click",function() {
        $("#createordeleteresourcecon").animate({top: "+=600px"},"slow");
        $("#conclusioncon").animate({top: "+=600px"},"slow");
        $("#htmlpage").animate({height: "+=600px"},"slow",function(){
            $("#createordeleteresourcecon").before('<div class="resourcecontainer"><div class="uploadresource"></div><textarea class="resourcedescription" maxlength="800" placeholder="describe how it should be used in the classroom"></textarea></div>');
        });
    });
	
	var files; //array of files currently in the lesson[INCOMPLETE]
   $("#uploadbutton").change(function(oInput){
			
			var ext = $('#uploadbutton').val().split('.').pop().toLowerCase();
			//var ext = filename.split('.').pop().toLowerCase();
			var wrongext = false;
			if($.inArray(ext, ['gif','png','jpg','jpeg','pptx','docx','xlsm']) == -1 ) {
				alert("Sorry you can't upload files of this type :(");
				wrongext = true;
			}
			
			//the file extension is right so call the php script
			if(wrongext == false){
				$("#confirmresource").click();
			}
			
			//display resource container
			if(wrongext == false){
				$("#uploadcontainer").before('<div class="resourcecontainer"><div class="resourcetitle"></div><div class="uploadresource"></div><textarea class="resourcedescription" maxlength="800" placeholder="describe how it should be used in the classroom"></textarea></div>');
				$("#htmlpage").css("height","+=450px;")
			}
			
			//detect if image is displayed
			var removeuploadclass = function(){
				$(".uploadresource").addClass("resourceuploaded");
				$(".resourceuploaded").removeClass("uploadresource"); 
			};
			
			//display the icon
			if(ext == 'pptx'){
				$(".uploadresource").append('<img src="Apps-Google-Drive-Slides-icon.png">');
				removeuploadclass();
			}
			if(ext == 'docx'){
				$(".uploadresource").append('<img src="Apps-Google-Drive-Docs-icon.png">');
				removeuploadclass();
			}
			if(ext == 'xlsm'){
				$(".uploadresource").append('<img src="Apps-Google-Drive-Sheets-icon.png">');
				removeuploadclass();
			}
			
			//text displaying
			$(".resourcecontainer").append("<p class='resourcetitlep'>"+ $('#uploadbutton').val().split('.').shift().split('fakepath').pop().substring(1, this.length)+"</p>");
			//$(".resourcecontainer").append("<p class='resourcetitlep'>"+ filename.split('.').shift().split('fakepath').pop().substring(1, this.length)+"</p>");
			$(".resourcecontainer").addClass("containerresource");
			$(".resourcecontainer").removeClass("resourcecontainer");
		
    });
    
    $("#uploadcontainer").on("click",function(){
        $("#uploadbutton").click();
		
    });
	
	$("#submitresource").on("click",function(){
		//save all information to a file in the lesson folder
        var title = $("#title").val();
		var takeaway = $("#takeaway").val();
		var intro = $("#gendescription").val();
		var conclusion = $("#conclusion").val();
		var allFiles = JSON.stringify(files); //the file names
		$.ajax({
			type: "POST",
			url: 'submitresource.php',
			data: { title: title, takeaway: takeaway, intro: intro, conclusion: conclusion, filenames: allFiles },
			success: function(data){
				console.log(data);
			}
		});
    });
	
   /* var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}*/
    
    
        /*$("#deletecircle").on("click",function(event){
            if(confirm("delete resource?")==true){
                $(event.target).closest('.resourcecontainer').remove();
            }
        });*/
		
		//load the shit from the JSON file into the page
		
		$.get('getsession.php', function(data) {
			var path = data; // $_SESSION['username'] in this case
			console.log(path);
		
		
			fetchJSONFile(path + 'data.json', function(data){
				console.log(data);
				//put the shit in the textarea
				$('#title').val(''); //title
				$('#takeaway').val(''); //takeaway
				$('#gendescription').val(''); //intro
				$('#conclusion').val('');
			});
		});
});