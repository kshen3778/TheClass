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
    $("#create").on("click",function(){
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
    });
    //end of navbar js
    
    //fadein tabs animation
    $("#dashboardmystuff").hide();
    $("#dashboardyourcourses").hide();
    $("#dashboardyourlikedcontent").hide();
    $("#dashboardyoursubs").hide();
    $("#dashboardtutoringsessions").hide();
    $("#fillinspace").hide();
    
    $("#dashboardyourcourses").fadeIn(600);
    $("#dashboardyourlikedcontent").fadeIn(700);
    $("#dashboardyoursubs").fadeIn(800);
    $("#dashboardtutoringsessions").fadeIn(900);
    $("#fillinspace").fadeIn(1000);  
    $("#dashboardmystuff").fadeIn(500);
    $("#dashboard").hide();
        $("#dashboard").fadeIn(500);
    $("#dashboard").animate({top: "110px"}, { duration: 500, queue: false });
    
    //end of fadein
    
    
        $("#mycoursesbox").show();
        $("#mylikesbox").hide();
        $("#mysubsbox").hide();
        $("#mytutoringsessionsbox").hide();
    

        $(".dashboardtab").on("click",function(event){
            $("#dashboardyourcourses").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyourlikedcontent").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardyoursubs").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#dashboardtutoringsessions").css({"height":"32px","border-bottom":"solid black 1px"});
            $("#mycoursesbox").hide();
            $("#mylikesbox").hide();
            $("#mysubsbox").hide();
            $("#mytutoringsessionsbox").hide();
        });

    
        $("#dashboardyourcourses").on("click",function(){
            $("#dashboardyourcourses").css({"height":"33px","border-bottom":"none"});
            $("#mycoursesbox").show();
        });
        $("#dashboardyourlikedcontent").on("click",function(){
            $("#dashboardyourlikedcontent").css({"height":"33px","border-bottom":"none"});
            $("#mylikesbox").show();

        });
        $("#dashboardyoursubs").on("click",function(){
            $("#dashboardyoursubs").css({"height":"33px","border-bottom":"none"});
            $("#mysubsbox").show();
        });
        $("#dashboardtutoringsessions").on("click",function(){
            $("#dashboardtutoringsessions").css({"height":"33px","border-bottom":"none"});
            $("#mytutoringsessionsbox").show();
        });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    });