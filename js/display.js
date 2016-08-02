
$(document).ready(function () {
    $(".display-box-bg").hover(function () {
        $(".display-box-img-cover").fadeIn(500);
    },function(){
        $(".display-box-img-cover").fadeOut(500);
    });
    // $("#display-user-add").on("click",function () {
    //     $(this).css("background-color","#b8b8b8");
    //     $("#display-user-add span").html("申请中");
    // });
});
