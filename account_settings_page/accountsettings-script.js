$(document).ready(function(){
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
    var perdata = $("#yourinterests").val();
        perdata = perdata + $("#aboutyou").val();
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
    $("#yourpeertutoringsessions").hide();
    $("#activitycontenttab").on("click",function(){
        $("#youruploadedcontent").show();
        $("#yourpeertutoringsessions").hide();
    });
    $("#activitypeertuttab").on("click",function(){
        $("#youruploadedcontent").hide();
        $("#yourpeertutoringsessions").show();
    });
    /*$(document).mouseup(function(e){
        var container = $(".write, #personalinfo, .unchangeinfo");
        if (!container.is(e.target)){
            $(".write").hide();
            $(".edit").show();
        }
    });*/
    
    //javascript:document.body.contentEditable='true';
});