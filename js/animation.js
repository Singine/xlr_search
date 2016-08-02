/**
 * Created by usersama on 2015/11/19.
 */
$(document).ready(function () {

    $("#header").hover(function(){
        $(this).css("border-color","rgba(0,0,0,1)");
        $("#services-menu").css("border-color","rgba(0,0,0,1)");
        $(this).css("background-color","rgba(0,0,0,0.8)");
        $("#services-menu").css("background-color","rgba(0,0,0,0.8)");
    },function(){
        $(this).css("border-color","rgba(185,185,185,0.6)");
        $("#services-menu").css("border-color","rgba(185,185,185,0.6)");
        $(this).css("background-color","transparent");
        $("#services-menu").css("background-color","transparent");
    });
    $(window).scroll(function () {
        if ($(document).scrollTop() <= 0) {
            $("#top").css("opacity","0");
            $(".reflactCorner").css("opacity","0");
            $("#header").css("background-color","transparent");
            $(".nav-li-a").css("color","#b9b9b9");
            $(".service-li-a").css("color","#b9b9b9");
            $("#services-menu").css("background-color","transparent");
            $("#header").hover(function(){
                $(this).css("border-color","rgba(0,0,0,1)");
                $("#services-menu").css("border-color","rgba(0,0,0,1)");
                $(this).css("background-color","rgba(0,0,0,0.8)");
                $("#services-menu").css("background-color","rgba(0,0,0,0.8)");
            },function(){
                $(this).css("border-color","rgba(185,185,185,0.6)");
                $("#services-menu").css("border-color","rgba(185,185,185,0.6)");
                $(this).css("background-color","transparent");
                $("#services-menu").css("background-color","transparent");
            });

            $("#nav-li1-1").hover(function(){
                $("#nav-li-a-1").css("color","#f9f9f9");
            },function(){
                $("#nav-li-a-1").css("color","#b9b9b9");
            });
            $("#nav-li2-1").hover(function(){
                $("#nav-li-a-2").css("color","#f9f9f9");
            },function(){
                $("#nav-li-a-2").css("color","#b9b9b9");
            });
            $("#nav-li3-1").hover(function(){
                $("#nav-li-a-3").css("color","#f9f9f9");
            },function(){
                $("#nav-li-a-3").css("color","#b9b9b9");
            });
            $("#nav-li4-1").hover(function(){
                $("#nav-li-a-4").css("color","#f9f9f9");
            },function(){
                $("#nav-li-a-4").css("color","#b9b9b9");
            });
            $("#service-li1-1").hover(function(){
                $("#service-li-a-1").css("color","#f9f9f9");
                $("#hr-list-1").css("border-top","2px solid #f05f40")
            },function(){
                $("#service-li-a-1").css("color","#b9b9b9");
                $("#hr-list-1").css("border-top","2px solid transparent")
            });
            $("#service-li1-2").hover(function(){
                $("#service-li-a-2").css("color","#f9f9f9");
                $("#hr-list-2").css("border-top","2px solid #f05f40")
            },function(){
                $("#service-li-a-2").css("color","#b9b9b9");
                $("#hr-list-2").css("border-top","2px solid transparent")
            });
            $("#service-li1-3").hover(function(){
                $("#service-li-a-3").css("color","#f9f9f9");
                $("#hr-list-3").css("border-top","2px solid #f05f40")
            },function(){
                $("#service-li-a-3").css("color","#b9b9b9");
                $("#hr-list-3").css("border-top","2px solid transparent")
            });
            $("#service-li1-4").hover(function(){
                $("#service-li-a-4").css("color","#f9f9f9");
                $("#hr-list-4").css("border-top","2px solid #f05f40")
            },function(){
                $("#service-li-a-4").css("color","#b9b9b9");
                $("#hr-list-4").css("border-top","2px solid transparent")
            });

        }
        else{
            $("#top").css("opacity","1");
            $(".reflactCorner").css("opacity","1");
            $("#header").css("background-color","white");
            $(".nav-li-a").css("color","black");
            $(".service-li-a").css("color","black");
            $("#services-menu").css("background-color","white");
            $("#header").hover(function(){

                $(this).css("background-color","white");
                $("#services-menu").css("background-color","white");
            },function(){

                $(this).css("background-color","white");
                $("#services-menu").css("background-color","white");
            });

            $("#nav-li1-1").hover(function(){
                $("#nav-li-a-1").css("color","#F05F40");
            },function(){
                $("#nav-li-a-1").css("color","black");
            });
            $("#nav-li2-1").hover(function(){
                $("#nav-li-a-2").css("color","#F05F40");
            },function(){
                $("#nav-li-a-2").css("color","black");
            });
            $("#nav-li3-1").hover(function(){
                $("#nav-li-a-3").css("color","#F05F40");
            },function(){
                $("#nav-li-a-3").css("color","black");
            });
            $("#nav-li4-1").hover(function(){
                $("#nav-li-a-4").css("color","#F05F40");
            },function(){
                $("#nav-li-a-4").css("color","black");
            });
            $("#service-li1-1").hover(function(){
                $("#service-li-a-1").css("color","#F05F40");
                $("#hr-list-1").css("border-top","2px solid rgba(0,0,0,1)")
            },function(){
                $("#service-li-a-1").css("color","black");
                $("#hr-list-1").css("border-top","2px solid transparent")
            });
            $("#service-li1-2").hover(function(){
                $("#service-li-a-2").css("color","#F05F40");
                $("#hr-list-2").css("border-top","2px solid rgba(0,0,0,1)")
            },function(){
                $("#service-li-a-2").css("color","black");
                $("#hr-list-2").css("border-top","2px solid transparent")
            });
            $("#service-li1-3").hover(function(){
                $("#service-li-a-3").css("color","#F05F40");
                $("#hr-list-3").css("border-top","2px solid rgba(0,0,0,1)")
            },function(){
                $("#service-li-a-3").css("color","black");
                $("#hr-list-3").css("border-top","2px solid transparent")
            });
            $("#service-li1-4").hover(function(){
                $("#service-li-a-4").css("color","#F05F40");
                $("#hr-list-4").css("border-top","2px solid rgba(0,0,0,1)")
            },function(){
                $("#service-li-a-4").css("color","black");
                $("#hr-list-4").css("border-top","2px solid transparent")
            });


        }
    });


    $("#nav-li2-1").hover(function(){
        $("#services-menu").slideToggle(200);
    });

    $("#nav-ul li ").click(function(event) {
        var index = this.title;
        var id='#'+'index_'+index;
        $("html,body").animate({scrollTop: ($(id).offset().top - 60)}, {easing: 'easeInOutQuart',duration: 1000,});
    });

    $("#top").click(function(event) {

            $('body,html').animate({ scrollTop: 0 }, {easing: 'easeInOutQuart',duration: 500,complete: function() {
                $("#top").css("opacity","0");}
            });

    });

    $(".service").hover(function(){
        $(this).animate({top:"-20px"},{easing: 'linear',duration: 100});
    },function(){
        $(this).animate({top:"0px"},{easing: 'linear',duration: 100});
    });



    var imgHeight = $(".headImage").height();
    var div1Height = $(".div1").height();
    var div2Height = $(".div2").height();
    var div3Height = $(".div3").height();
    var div4Height = $(".div4").height();
    var activeHeight = $(document).scrollTop();



});