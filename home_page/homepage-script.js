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
    
    //fadein tabs animation
    $("#dashboardmystuff").hide();
    $("#dashboardyourcourses").hide();
    $("#dashboardyourtutoringsessions").hide();
    $("#dashboardyoursubs").hide();
    $("#dashboardyourhistory").hide();
    $("#dashboardyourlikes").hide();
    $("#fillinspace").hide();
    
    $("#dashboardyourcourses").fadeIn(600);
    $("#dashboardyourtutoringsessions").fadeIn(700);
    $("#dashboardyoursubs").fadeIn(800);
    $("#dashboardyourhistory").fadeIn(900);
    $("#dashboardyourlikes").fadeIn(1000);
    $("#fillinspace").fadeIn(1100);  
    $("#dashboardmystuff").fadeIn(500);
    $("#dashboard").hide();
        $("#dashboard").fadeIn(500);
    $("#dashboard").animate({top: "110px"}, { duration: 500, queue: false });
    
    //end of fadein
    
    
        $("#mycoursesbox").show();
        $("#mytutoringsessionsbox").hide();
        $("#mysubsbox").hide();
        $("#myhistorybox").hide();
        $("#mylikesbox").hide();
    

        $(".dashboardtab").on("click",function(event){
            $("#dashboardyourcourses").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyourtutoringsessions").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyoursubs").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyourhistory").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyourlikes").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#mycoursesbox").hide();
            $("#mytutoringsessionsbox").hide();
            $("#mysubsbox").hide();
            $("#myhistorybox").hide();
            $("#mylikesbox").hide();
        });

    
        $("#dashboardyourcourses").on("click",function(){
            $("#dashboardyourcourses").css({"height":"33px","border-bottom":"none"});
            $("#mycoursesbox").show();
        });
        $("#dashboardyourtutoringsessions").on("click",function(){
            $("#dashboardyourtutoringsessions").css({"height":"33px","border-bottom":"none"});
            $("#mytutoringsessionsbox").show();

        });
        $("#dashboardyoursubs").on("click",function(){
            $("#dashboardyoursubs").css({"height":"33px","border-bottom":"none"});
            $("#mysubsbox").show();
        });
        $("#dashboardyourhistory").on("click",function(){
            $("#dashboardyourhistory").css({"height":"33px","border-bottom":"none"});
            $("#myhistorybox").show();
        });
        $("#dashboardyourlikes").on("click",function(){
            $("#dashboardyourlikes").css({"height":"33px","border-bottom":"none"});
            $("#mylikesbox").show();
        });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    });