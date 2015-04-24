$(document).ready(function() {
    $("#logintab").hide();
    $("#registrationtab").hide();
    
    $("#openlogin").on("click",function(){
        $("#openlogin").animate({ top: '+=100px'}, { duration: 500, queue: false });
        $("#openlogin").fadeTo(500, 0);
        $("#logintab").animate({ top: '+=200px'}, { duration: 500, queue: false });
        $("#logintab").fadeTo(500, 1);
        $("#register").hide();
    });
    
        $("#register").on("click",function(){
        $("#register").animate({ top: '+=100px'}, { duration: 500, queue: false });
        $("#register").fadeTo(500, 0);
        $("#registrationtab").animate({ top: '+=200px'}, { duration: 500, queue: false });
        $("#registrationtab").fadeTo(500, 1);
        $("#openlogin").fadeTo(500, 0);
    });
    $("#closetablog").on("click",function(){
        $("#logintab").animate({ top: '+100px' }, { duration: 500, queue: false });
        $("#logintab").fadeTo(500, 0,function(){
        $("#logintab").hide();
        });
        $("#openlogin").animate({ top: '+400px' }, { duration: 500, queue: false });
        $("#openlogin").fadeTo(500, 1,function(){
            $("#register").fadeTo(500, 1);
        });
    });
    $("#closetabreg").on("click",function(){
        $("#registrationtab").animate({ top: '+100px'}, { duration: 500, queue: false });
        $("#registrationtab").fadeTo(500, 0,function(){
        $("#registrationtab").hide();
        });
        $("#register").animate({ top: '+440px'}, { duration: 500, queue: false });
        $("#register").fadeTo(500, 1,function(){
        $("#openlogin").fadeTo(500, 1);
        });
    });
});