$(document).ready(function () {
    $(".system-notice-click").on("click",function () {
       $(".content-notice-choice").slideToggle(500);
       $(".content-notice-info").slideToggle(500);
    });
    $(".chat-notice-click").on("click",function () {
        $(".content-notice-chat").slideToggle(500);
    });
    $(".collect-notice-click").on("click",function () {
        $(".collect-notice-container").slideToggle(500);
    });
    
    $("#choice-agree").on("click",function () {
        $(".system-choice").css("display","none");
        $(".system-result-agree a").css("display","block");
    });
    $("#choice-refuse").on("click",function () {
        $(".system-choice").css("display","none");
        $(".system-result-refuse a").css("display","block");
    });
    $(".tipback-reply").on("click",function () {
        $(".tipback-cover").fadeIn(400);
    });
    $(".tipback-cross").on("click",function () {
        $(".tipback-cover").fadeOut(400);
    });
    $(".user-notice-tipback").click(function () {
        var userNum = $(this).parent().parent().find(".user-id").val();
        $(".user-id-reply").val(userNum);
        var username = $(this).parent().parent().find(".user-info-name").html();
        $(".tipback-name").html(username);
    });
});