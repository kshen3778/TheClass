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
    });
    //end of navbar js
    $("#addcircle").on("click",function() {
        $("#createordeleteresourcecon").animate({top: "+=600px"},"slow");
        $("#conclusioncon").animate({top: "+=600px"},"slow");
        $("#htmlpage").animate({height: "+=600px"},"slow",function(){
            $("#createordeleteresourcecon").before('<div class="resourcecontainer"><div class="uploadresource"></div><textarea class="resourcedescription" maxlength="800" placeholder="describe how it should be used in the classroom"></textarea></div>');
        });
    });

    
    
    
        /*$("#deletecircle").on("click",function(event){
            if(confirm("delete resource?")==true){
                $(event.target).closest('.resourcecontainer').remove();
            }
        });*/
    });