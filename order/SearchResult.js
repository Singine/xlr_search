/**
 * Created by Neora on 2015/12/20.
 */
$(document).ready(function(){


    $(".btn2").click(function(event) {

        $("#searchResult").fadeIn(500);
        $("html,body").animate({scrollTop: ($("#searchResult").offset().top - 50)}, {easing: 'easeInOutQuart',duration: 1000,});

        var pub=$("#search-input").val();

        var submitData={
            pub:pub
        }
        $.ajax({
            type:'POST',
            url:'http://120.55.66.210:3210/searchBooks',
            contentType:"application/json",
            data:JSON.stringify(submitData),
            success:function(data){
                $("#content-loading").remove();
                $(".result-box").remove();
                $(".resultnotfound").remove();

                if(data.length>0){
                    $("#paging").css("display","block");
                    var i = 0;

                    while (i < data.length){
                        var title = data[i].catpub;
                        var content = data[i].catfoodcon;
                        var price = data[i].catfood;
                        $("#appendtag").append("<div class='result-box'>" +
                            "<div class='result-box-img'></div>" +
                            "<div class='result-box-content'>" +
                            "<div class='result-title-form'><span>" +
                             title +
                            "</span></div>" +
                            "<div class='result-words-form'><a class='result-box-words'>" +
                             content +
                            "</a></div>" +
                            "<div class='result-price-form'><a class='result-box-price'>定价：" +
                             price +
                            "元</a><a class='result-box-credit'>100%</a></div>" +
                            "<div class='result-box-btn'>" +
                            "<div class='result-box-btn-left'>" +
                            "<a href='javascript:void(0)'>收藏</a>" +
                            "</div>" +
                            "<div class='result-box-btn-right'>" +
                            "<a href='javascript:void(0)'>查看</a>" +
                            "</div>" +
                            "</div>" +
                            "</div>");
                            i++;
                    }
                    
                $("#sb").val(data[0].catpub);
                }else{

                    $("#paging").css("display","none");
                    $("#appendtag").append("<div class='resultnotfound'><span>未搜索到内容！</span></div>");


                }
                
            }
        });

    });





    $("#topBTN").click(function(event) {

        $('body,html').animate({ scrollTop: 0 }, {easing: 'easeInOutQuart',duration: 1000,complete: function() {

            $(".reflactCorner").css("opacity","0");}
        });

    });
    $(".reflactCorner").hover(function(){
        $(".reflactCorner").css("height","160px");
        $(".cornerBTN-content").slideDown(400);

    },function(){
        $(".reflactCorner").css("height","40px");
        $(".cornerBTN-content").slideUp(400);

    });
    $(".cornerBTN-content").hover(function(){

        $(this).css({"background-color":"rgba(227,64,58,1)"});



    },function(){
        $(this).css({"background-color":"white"});

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