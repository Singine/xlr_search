/**
 * Created by Neora on 2015/11/23.
 */
$(document).ready(function () {

    $("#logoutslide").hover(function(){
        $(".logoutslide").fadeIn(200);
    },function(){
        $(".logoutslide").fadeOut(200);
    });

    var resultheight = $(window).height();
    $(".resultbg").css("height",resultheight)

    $("#search-input").on("focus",function(){
       $("#img-cover").css("background-color","rgba(0,0,0,0.5)") ;

    });
    $("#search-input").on("blur",function(){
        $("#img-cover").css("background-color","rgba(0,0,0,0.3)") ;
    });


    //$("#searchClick").on("click",function(){
    //    alert("11");
    //});
    //$(".btn2").on("click",function(){
    //    $("#searchClick").click();
    //});

    //if($(".cs-skin-slide.cs-active::before")){
    //    $(".search").css("height","100px") ;
    //}
    //else{
    //    $(".search").css("height","50px") ;
    //}

    $(".fixedTip1").animate({ opacity:1 }, {easing: 'easeInOutQuart',duration: 500,complete: function() {
        }
    });
    $(".fixedTip2").animate({ opacity:1 }, {easing: 'easeInOutQuart',duration: 500,complete: function() {
    }
    });

    $(".close1").on("click",function(){
        $(".fixedTip1").animate({ opacity:0 }, {easing: 'easeInOutQuart',duration: 500,complete: function() {
            $(".fixedTip1").css("display","none")}
        });
    });
    $(".close2").on("click",function(){
        $(".fixedTip2").animate({ opacity:0 }, {easing: 'easeInOutQuart',duration: 500,complete: function() {
            $(".fixedTip2").css("display","none")}
        });
    });


    $(window).scroll(function () {
        if ($(document).scrollTop() <= 0) {
            $("#header-books").css("background-color","transparent");
            $("#header-books").css("height","80px");
            $("#nav-books").css("height","80px");
            $(".nav-books-li").css("height","80px");
            $(".logoutslide").css("top","70px");
            $("#nav-books-li-a-1").css("top","30px");
            $("#nav-books-li-a-1").css("font-size","15px");
            $("#nav-books-li-a-2").css("top","30px");
            $("#nav-books-li-a-2").css("font-size","15px");
            $(".nav-books-li-a").css("top","30px");
            $(".nav-books-li-a").css("font-size","15px");
            $("#nav-books-li-a-4").css("top","30px");
            $("#nav-books-li-a-4").css("font-size","15px");
            $(".search-min").fadeOut(300);
        }
        else{
            $("#header-books").css("background-color","rgba(0,0,0,0.7)");
            $("#header-books").css("height","50px");
            $(".nav-books-li").css("height","50px");
            $("#nav-books").css("height","50px");
            $(".logoutslide").css("top","50px");
            $("#nav-books-li-a-1").css("top","15px");
            $("#nav-books-li-a-1").css("font-size","10px");
            $("#nav-books-li-a-2").css("top","15px");
            $("#nav-books-li-a-2").css("font-size","10px");
            $(".nav-books-li-a").css("top","15px");
            $(".nav-books-li-a").css("font-size","10px");
            $("#nav-books-li-a-4").css("top","15px");
            $("#nav-books-li-a-4").css("font-size","10px");
            $(".search-min").fadeIn(300);
        }
    });

    $("#loginbtn").on("click",function(){

        var loginpwd = $("#psw1_1").val();
        var hashlogin = hex_md5(loginpwd);
        document.getElementById("psw1_1").value = hashlogin;


    });
    $("#registerbtn").on("click",function(){

        var registerpwd1 = $("#psw1").val();
        var registerpwd2 = $("#psw2").val();
        var hashregisterpwd1 = hex_md5(registerpwd1);
        var hashregisterpwd2 = hex_md5(registerpwd2);
        document.getElementById("psw1").value = hashregisterpwd1;
        document.getElementById("psw2").value = hashregisterpwd2;

    });





});