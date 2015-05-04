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
        $("#navbarinfo").css("top","-208px");
        $("#createpopupbox").fadeIn();
        $("#htmlpage").css("z-index","-1");
        $("#navbar").css("z-index","-1");
        $("#navbarinfo").css("z-index","-1");
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
    $("#fillinspace").hide();
    $("#dashboardyourcourses").fadeIn(700);
    $("#dashboardyourlikedcontent").fadeIn(800);
    $("#dashboardyoursubs").fadeIn(900);
    $("#fillinspace").fadeIn(1000);  
    $("#dashboardmystuff").fadeIn(500);
    
    
    
    
        $("#mycoursesbox").show();
        $("#mylikesbox").hide();
        $("#mysubsbox").hide();
        $("#dashboardyourcourses").on("click",function(){
            $("#dashboardyourcourses").css({"height":"34px","border-bottom":"none"});
            $("#dashboardyourlikedcontent").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#dashboardyoursubs").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#mycoursesbox").show();
            $("#mylikesbox").hide();
            $("#mysubsbox").hide();
        });
        $("#dashboardyourlikedcontent").on("click",function(){
            $("#dashboardyourlikedcontent").css({"height":"34px","border-bottom":"none"});
            $("#dashboardyoursubs").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#dashboardyourcourses").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#mycoursesbox").hide();
            $("#mylikesbox").show();
            $("#mysubsbox").hide();

        });
        $("#dashboardyoursubs").on("click",function(){
            $("#dashboardyoursubs").css({"height":"34px","border-bottom":"none"});
            $("#dashboardyourcourses").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#dashboardyourlikedcontent").css({"height":"33px","border-bottom":"solid black 1px"});
            $("#mycoursesbox").hide();
            $("#mylikesbox").hide();
            $("#mysubsbox").show();
        });
    });