var toggleshowprofile = false;
$(document).ready(function(){
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
    //open animation
    $("#profile").hide();
    $("#personalinfo").hide();
    $("#yourstats").hide();
    $("#featuredlessonsandcourses").hide();
    $("#profile").fadeIn(600);
    $("#personalinfo").fadeIn(1300);
    $("#featuredlessonsandcourses").fadeIn(1000);
    $("#yourstats").fadeIn(1000);
    $("#yourstats").animate({top: "90px"}, { duration: 1000, queue: false });
    $('#youruploads').hide();
    $("#youractivity").hide();
    $("#addachapter").hide();
    $(window).scroll(function() {
    var height = $(window).scrollTop();

    if(height  > 300) {
        $("#youruploads").animate({top: "900px"}, { duration: 300, queue: false });
        $('#youruploads').fadeIn(300,function(){
            $("#youractivity").animate({top: "1150px"}, { duration: 300, queue: false });
            $('#youractivity').fadeIn(300,function(){
                $("#addachapter").animate({top: "1400px"}, { duration: 300, queue: false });
                $('#addachapter').fadeIn(300);
            });
        });
    }
});
    //end of open animation
    //edit personal info
    $(".write").hide();
    var hideeditbuttons = function(){
        $("#cancelchangeinfo").hide();
        $("#savechanges").hide();
    };
    hideeditbuttons();
    var resetchangeinfo = function(){
        $(".write").hide();
        $('.edit').show();
    };
    var resetchangecomple = function(){
        resetchangeinfo();
        hideeditbuttons();
    };
    //outline: none;
    var ele;
    $('.edit').on("click",function(event){
        resetchangeinfo();
        ele = event.target;
        $(ele).hide();
        $(ele).siblings(".write").show();
        $("#cancelchangeinfo").show();
        $("#savechanges").show();
        $(ele).siblings(".personaldata").hide();
        var replacepertext = $(ele).siblings(".personaldata");
        if($(ele).siblings(".write").val()==0){
        $(ele).siblings(".write").val(replacepertext.html());
        }
    });
    
    $("#savechanges").on("click",function(){
        $(ele).siblings(".personaldata").remove();
		var perdata = $(ele).siblings(".write").val();
        $(ele).after('<div class="personaldata">'+perdata+'</div>');
    $('#yourinterests, #aboutyou').val("");
        resetchangecomple();
        $(".personaldata").show();
    });
    $("#cancelchangeinfo").on("click",function(){
            resetchangecomple();
        $(".personaldata").show();
        $('#yourinterests, #aboutyou').val("");
    });
    //end of personal info js
    
    
    
    
    /*$(document).mouseup(function(e){
        var container = $(".write, #personalinfo, .unchangeinfo");
        if (!container.is(e.target)){
            $(".write").hide();
            $(".edit").show();
        }
    });*/
    
    //javascript:document.body.contentEditable='true';
});