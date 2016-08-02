/**
 * Created by usersama on 2015/12/19.
 */
$(document).ready(function () {
    $(".select-btn").on("click",function(){
        index = this.value;
        id='#'+'select-btn-'+index;
        $(".select-btn").removeClass("active");
        $(id).addClass("active");


        if(index){
            $(".select-judge").css("opacity","0");
            $(".item-select a").css("background-color","#3f7bc9");
            $(".item-select-box-btn").css("border","1px solid  #3f7bc9");

            $(".select-btn").hover(function(){
                $(this).css("background","#3f7bc9");
                $(this).css("color","#white");
                $(this).click(function(){
                    $(".select-btn").css("background","white");
                    $(this).css("background","#3f7bc9");
                });
            },function(){
                $(".select-btn").css("background","white");
                $(id).css("background","#3f7bc9");
                $(this).css("color","#black");
            });
        }else{
            $(".select-judge").css("opacity","1");
            $(".item-select a").css("background-color","#f05f40");
            $(".item-select-box-btn").css("border","1px solid  #f05f40");
        }

        if(index ==3){
            $(".item-3").slideUp(500);
            //$(".item-3").css("display","none");
        }
        else{
            $(".item-3").slideDown(500);
            //$(".item-3").css("display","block");
        }


    });
    $(".new-btn").on("click",function(){
        index2 = this.value;
        id2='#'+'new-btn-'+index2;
        $(".new-btn").removeClass("active");
        $(id2).addClass("active");

        if(index2){
            $(".new-judge").css("opacity","0");
            $(".item-new a").css("background-color","#3f7bc9");
            $(".item-new-box-btn").css("border","1px solid  #3f7bc9");

            $(".new-btn").hover(function(){
                $(this).css("background","#3f7bc9");
                $(this).css("color","#white");
                $(this).click(function(){
                    $(".new-btn").css("background","white");
                    $(this).css("background","#3f7bc9");
                });
            },function(){
                $(".new-btn").css("background","white");
                $(id2).css("background","#3f7bc9");
                $(this).css("color","#black");
            });
        }else{
            $(".new-judge").css("opacity","1");
            $(".item-new a").css("background-color","#f05f40");
            $(".item-new-box-btn").css("border","1px solid  #f05f40");
        }
    });


        $(".select-btn").click(function(){
            var selectval = $(this).val();
            $("#select-input").attr("value",selectval);
        });
         $(".new-btn").click(function(){
               var newval = $(this).val();
          $("#new-input").attr("value",newval);
    });




});