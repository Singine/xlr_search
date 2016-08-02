
$(document).ready(function () {
    $("#logoutslide").hover(function(){
        $(".logoutslide").fadeIn(300);
    },function(){
        $(".logoutslide").fadeOut(300);
    });
    var winHeight;
    winHeight =$(window).height()-50;
    $(".leftMenu").css("height",winHeight);
    $(".content-bg").css("height",winHeight);
    //$(".menu-main").click(function(){
    //    index = this.title;
    //    id='#'+'menu_'+index;
    //    menu='#'+'menu_inside_'+index;
    //    $(".menu-main").removeClass("active");
    //    $(this).addClass("active",function(){
    //        $(id).on("click",function(){
    //            $(menu).slideDown(1000);
    //        });
    //    });
    //
    //});
    //var contentWidth = $(window).width()-100;
    //$(".content").css("width",contentWidth);
    $(".info-left-cover").hover(function(){
        $(".info-left-cover").css("background-color","rgba(0,0,0,0.5)");
        $(".info-left-add").css("opacity","0.5");
        $(".info-left-add").hover(function(){
            $(this).css("opacity","1");
        },function(){
            $(this).css("opacity","0.5");
        });
    },function(){
        $(".info-left-cover").css("background-color","rgba(0,0,0,0)");
        $(".info-left-add").css("opacity","0");
    });

    var leftmenu = 1;
    leftmenu_ready = 1;
    $(".user-write").on("click",function(){
        if(leftmenu == 1){

            $(".leftMenu").animate({width:"18%"}, {easing: 'easeInOutQuart',duration: 500,complete:function() {
                leftmenu_ready = 0;
                $(".user-write").animate({top:"150px"}, {easing: 'easeInOutQuart',duration: 0,complete:function() {

                }});
                $(".info-left-img").css("margin","10px 10px");
                $(".user-info-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 0});
                $(".menu-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 400});
                $(".menu-left-ul").animate({left:"9%"}, {easing: 'easeInOutQuart',duration: 400});
                $(".info-left-name").animate({opacity:"1"}, {easing: 'easeInOutQuart',duration: 0});
                $(".btn3").css("transition-delay","0s");
                $(".menu-left-ul-inside").fadeIn(500);

                leftmenu = 0;
            }});
        }
    });
    $(".leftMenu").on("click",function(){
        if(leftmenu == 1){

            $(".leftMenu").animate({width:"18%"}, {easing: 'easeInOutQuart',duration: 500,complete:function() {
                leftmenu_ready = 0;
                $(".user-write").animate({top:"150px"}, {easing: 'easeInOutQuart',duration: 0,complete:function() {
                    $(".user-words").css("opacity","1");
                }});
                $(".info-left-img").css("margin","10px 10px");


                $(".user-info-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 0});
                $(".menu-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 400});
                $(".menu-left-ul").animate({left:"9%"}, {easing: 'easeInOutQuart',duration: 400});
                $(".info-left-name").animate({opacity:"1"}, {easing: 'easeInOutQuart',duration: 0});
                $(".btn3").css("transition-delay","0s");
                $(".menu-left-ul-inside").fadeIn(500);

                leftmenu = 0;
            }});
        }
    });

    $(".menu-main").on("click",function(){
        $(".menu-main").removeClass("active");
        $(this).addClass("active");
        $(".menu-inside").on("click",function(){
            index = this.title;
            id='#'+'menu_'+index;
            $(".menu-main").removeClass("active");
            $(id).addClass("active");
        });
        if(leftmenu == 1){

        $(".leftMenu").animate({width:"18%"}, {easing: 'easeInOutQuart',duration: 500,complete:function() {
            leftmenu_ready = 0;
            $(".user-write").animate({top:"150px"}, {easing: 'easeInOutQuart',duration: 0,complete:function() {

            }});
            $(".info-left-img").css("margin","10px 10px");
            $(".user-info-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 0});
            $(".menu-left").animate({width:"300px"}, {easing: 'easeInOutQuart',duration: 400});
            $(".menu-left-ul").animate({left:"9%"}, {easing: 'easeInOutQuart',duration: 400});
            $(".info-left-name").animate({opacity:"1"}, {easing: 'easeInOutQuart',duration: 0});
            $(".btn3").css("transition-delay","0s");
            $(".menu-left-ul-inside").fadeIn(500);

            leftmenu = 0;
        }});
        }

        //$(".content").animate({width:"80%"}, {easing: 'easeInOutQuart',duration: 500})
    });
    $(".content").on("click",function(){
        if(leftmenu == 0) {
            leftmenu_ready = 1;

            $(".user-words").css("opacity","0");
            $(".user-input").css("opacity","0");
            $(".user-write").animate({top:"120px"}, {easing: 'easeInOutQuart',duration: 0});
            $(".menu-main").removeClass("active");
            $(".menu-left-ul").animate({left: "0px"}, {easing: 'easeInOutQuart', duration: 400});
            $(".menu-left").animate({width: "100px"}, {easing: 'easeInOutQuart', duration: 400});
            $(".info-left-img").css("margin","10px auto");
            $(".user-info-left").animate({width: "100px"}, {
                easing: 'easeInOutQuart', duration: 0, complete: function () {

                    $(".leftMenu").animate({width: "8%"}, {easing: 'easeInOutQuart', duration: 500});
                    $(".info-left-name").animate({opacity: "0"}, {easing: 'easeInOutQuart', duration: 0});
                    $(".btn3").css("transition-delay", "1s");
                    $(".menu-left-ul-inside").fadeOut(500);
                    leftmenu = 1;
                }
            });
        }



        //$(".leftMenu").animate({width:"8%"}, {easing: 'easeInOutQuart',duration: 500,complete:function() {
        //    $(".user-info-left").css("width","100px");
        //} });

        //$(".content").animate({width:"92%"}, {easing: 'easeInOutQuart',duration: 500,complete:function() {
        //} })
    });

    if (leftmenu_ready == 0){
        $(".user-write").on("click",function(){
            $(".user-words").css("opacity","0");
            $(".user-input").css("opacity","1");

        });
    }

    $(".userSearch").focus(function(){
        $(".userSearch").attr("placeholder","请输入搜索的内容！");
        $(".userSearch").css("width","160px");
        $(".userSearch-bg"). animate({width:"180px"}, {duration: 300,complete:function() {




        } });


    });
    $(".userSearch").blur(function(){
        $(".userSearch").attr("placeholder","");
        $(".userSearch").css("width","120px");
        $(".userSearch-bg"). animate({width:"145px"}, {duration:300,complete:function() {



        } });
    });




    $("#sign-a").mousedown(function(){
       $(this).css("background-color","#29497E");
    });
    $("#sign-a").mouseup(function(){
        $(this).css("background-color","#3562a5");
    });

    $("#sign-a").click(function(){
        $("#sign"). animate({left:"-100px"}, {easing: 'easeInOutQuart',duration: 500});
        $("#signed"). animate({left:"23px"}, {easing: 'easeInOutQuart',duration: 500});
    });
    t = 1;
    $(".downBTN").click(function(){


        if(t  == 1) {

            $(".downBTN").animate({top: "257px"}, {
                easing: 'easeInOutQuart', duration: 500, complete: function () {
                }
            });
            $(".content-box").animate({height: "400px"}, {
                easing: 'easeInOutQuart',
                duration: 500,
                complete: function () {
                    $(".downBTN-a").html("点击收起统计");
                    $(".statistics").css("opacity","1");
                    $(".statistics-img").css("opacity","1");

                }
            });
            t=0;
        }
        else{
            $(".statistics-img").css("opacity","0");
            $(".statistics").css("opacity","0");
            $(".downBTN").animate({top: "107px"}, {
                easing: 'easeInOutQuart', duration: 500, complete: function () {
                }
            });
            $(".content-box").animate({height: "250px"}, {
                easing: 'easeInOutQuart',
                duration: 500,
                complete: function () {
                    $(".downBTN-a").html("点击查看统计");

                }
            });
            t=1;

        }
    });

        $("#left-tag").on("click", function () {
            $(".tag-cover").css("left", "115px");
            $("#left-tag span").removeClass("span-active");
            $("#left-tag span").removeClass("span-normal");
            $("#right-tag span").removeClass("span-active");
            $("#right-tag span").removeClass("span-normal");
            $("#left-tag span").addClass("span-active");
            $("#right-tag span").addClass("span-normal");
        });
        $("#right-tag").on("click",function(){
            $(".tag-cover").css("left", "230px");
            $("#left-tag span").removeClass("span-active");
            $("#left-tag span").removeClass("span-normal");
            $("#right-tag span").removeClass("span-active");
            $("#right-tag span").removeClass("span-normal");
            $("#right-tag span").addClass("span-active");
            $("#left-tag span").addClass("span-normal");
        });



});
