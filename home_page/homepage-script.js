var toggleshowprofile = false;
$(document).ready(function() {

    $("#navprofile").on("click",function(){
        if(toggleshowprofile==true){
            $("#profilesettingcon").stop().animate({left: "+=200px"});
            toggleshowprofile=false;
        }
        else{
            $("#profilesettingcon").stop().animate({left: "-=200px"});
            toggleshowprofile = true;
        }
    });
    $("#browse").hide();
    $("#dashboardtab").on("click",function(){
        $("#dashboard").show();
        $("#browse").hide();
    });
    $("#browsetab").on("click",function(){
        $("#dashboard").hide();
        $("#browse").show();
    });
    $("#createpopupbox").hide();
    $("#create").on("click",function(){
        $("#htmlpage").fadeTo(500,0.5);
        $("#navbar").fadeTo(500,0.5);
        $("#htmlpage").css("top","-16.9vh");
        $("#createpopupbox").fadeIn();
        $("#htmlpage").css("z-index","-1");
    });
    $("#closecreate").on("click",function(){
        $("#htmlpage").fadeTo(500,1);
        $("#navbar").fadeTo(500,1);
        $("#createpopupbox").fadeOut(function(){
            $("#htmlpage").css("top","4.1vh");
            $("#htmlpage").css("z-index","0");
        });
    });
    
    
    });