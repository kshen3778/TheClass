var toggleshowprofile = false;
$(document).ready(function() {

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
    $("#dashboardtabcontainer").hide();
    $("#dashboardtabcontainer").fadeIn(1000);
    $("#browse").hide();
    $("#dashboardtab").on("click",function(){
        $("#dashboardtabcontainer").fadeIn(1000);
        $("#dashboardtab").animate({width: '300px'});
        $("#dashboard").show();
        $("#browse").hide();
    });
    $("#browsetab").on("click",function(){
        $("#dashboardtabcontainer").hide();
        $("#dashboardtab").animate({width: '100px'});
        $("#dashboard").hide();
        $("#browse").show();
    });
    $("#createpopupbox").hide();
    $("#create").on("click",function(){
        $("#htmlpage").fadeTo(500,0.5);
        $("#navbar").fadeTo(500,0.5);
        $("#htmlpage").css("top","-168px");
        $("#createpopupbox").fadeIn();
        $("#htmlpage").css("z-index","-1");
        $("#navbar").css("z-index","-1");
    });
    $("#closecreate").on("click",function(){
        $("#htmlpage").fadeTo(500,1);
        $("#navbar").fadeTo(500,1);
        $("#createpopupbox").fadeOut(function(){
            $("#htmlpage").css("top","32px");
            $("#htmlpage").css("z-index","0");
            $("#navbar").css("z-index","1");
        });
    });
    
    $("#dashboardyourcourses").on("click",function(){
        $("#dashboardyourcourses").css({"height":"21px","border-bottom":"none"});
        $("#dashboardyourlikedcontent").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#dashboardyoursubs").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#mycoursesbox").show();
        $("#mylikesbox").hide();
        $("#mysubsbox").hide();
    });
    $("#dashboardyourlikedcontent").on("click",function(){
        $("#dashboardyourlikedcontent").css({"height":"21px","border-bottom":"none"});
        $("#dashboardyoursubs").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#dashboardyourcourses").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#mycoursesbox").hide();
        $("#mylikesbox").show();
        $("#mysubsbox").hide();
        
    });
    $("#dashboardyoursubs").on("click",function(){
        $("#dashboardyoursubs").css({"height":"21px","border-bottom":"none"});
        $("#dashboardyourcourses").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#dashboardyourlikedcontent").css({"height":"20px","border-bottom":"solid black 1px"});
        $("#mycoursesbox").hide();
        $("#mylikesbox").hide();
        $("#mysubsbox").show();
    });
    
    
    
    
    
    });