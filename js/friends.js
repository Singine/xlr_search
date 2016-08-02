$( document ).ready( function() {
    $(".tipback-reply").click(function () {
        var userNum = $(this).parent().parent().find("input").val();
        $(".user-id-reply").val(userNum);
        var username = $(this).parent().parent().find(".recommend-box-content span").html();
        $(".tipback-name").html(username);
    });
});