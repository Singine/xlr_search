/**
 * Created by Neora on 2015/12/20.
 */


$(document).ready(function(){



    //
    $("#search-input").on('input propertychange', function(event) {

        var pub=$("#search-input").val();
        if(pub != "")
            bemethods.PreList(pub);
    });


    $(".btn2").click(function(event) {
        $("#searchResult").fadeIn(500);
        $("html,body").animate({scrollTop: ($("#searchResult").offset().top - 50)}, {easing: 'easeInOutQuart',duration: 1000,});

        bemethods.StartLoading();
        var pub=$("#search-input").val();
        bemethods.GetRows(pub);

    });




    $(".reflactCorner").click(function(event) {

        $('body,html').animate({ scrollTop: 0 }, {easing: 'easeInOutQuart',duration: 1000,complete: function() {

            $(".reflactCorner").css("opacity","0");}
        });

    });
    $(".reflactCorner").hover(function(){
        t = setTimeout(function(){
                $("#topBTN").fadeOut(300);
                $(".corner-a").fadeIn(300);
            },200);

    },function(){
        clearTimeout(t);
        $("#topBTN").fadeIn(300);
        $(".corner-a").fadeOut(300);
    });


    //function loadingIndex(){
    //    //var imgi = document.getElementById("loading-cover").getElementsByTagName("img").length;
    //
    //    var loadImg = document.getElementById('img1');
    //    loadImg.addEventListener('load', function () {
    //        document.getElementById("index-div").style.display = "block";
    //        document.getElementById("loading-cover").style.display = "none";
    //    });
    //}
    //window.onload = loadingIndex();
    //function loadingIndex(){
    //    var qim=new Image();//新建一个图片；
    //    qim.src="images/search1.png";//图片地址是你准备要加载的地址；
    //    if(qim.complete){
    //        document.getElementById("index-div").style.display = "block";
    //        document.getElementById("loading-cover").style.display = "none";
    //    }
    //}
    //window.onload = loadingIndex();

    //$("#img1").load(function(){
    //
    //    $("#loading-cover").fadeOut(1000);
    //    $("#index-div").fadeIn(1000);
    //});

});

