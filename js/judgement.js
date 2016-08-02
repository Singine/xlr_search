/**
 * Created by Neora on 2015/12/21.
 */


function verify(){
    var title = $("#titleJudge").val();
    var chineseRe = /^[\d|A-z|\u4E00-\u9FFF]{6,20}$/;
    var price = $("#priceJudge").val();
    var money = /^\d{1,5}$/;
    var school = $("#school").val();
    var schoolFix =/^.*大学$/;
    var name = $("#nameJudge").val();
    var nameFix =/^[\u4E00-\u9FA5]{2,5}(?:·[\u4E00-\u9FA5]{2,5})*$/;
    var phone = $("#phoneJudge").val();
    var phoneFix =/^[1][358][0-9]{9}$/;

    if(!chineseRe.test(title)){
        $(".title-judge").css("opacity","1");
        $(".item-title a").css("background-color","#f05f40");
        $(".title-input").css("border","1px solid  #f05f40");
    }else{
        $(".title-judge").css("opacity","0");
        $(".item-title a").css("background-color","#3f7bc9");
        $(".title-input").css("border","1px solid  #3f7bc9");


    }
    if(!money.test(price)){
        $(".price-judge").css("opacity","1");
        $(".item-price a").css("background-color","#f05f40");
        $(".price-input").css("border","1px solid  #f05f40");
    }else{
        $(".price-judge").css("opacity","0");
        $(".item-price a").css("background-color","#3f7bc9");
        $(".price-input").css("border","1px solid  #3f7bc9");
    }
    if(!schoolFix.test(school)){
        $(".school-judge").css("opacity","1");
        $(".item-location a").css("background-color","#f05f40");
        $(".school-input").css("border","1px solid  #f05f40");
    }else{
        $(".school-judge").css("opacity","0");
        $(".item-location a").css("background-color","#3f7bc9");
        $(".school-input").css("border","1px solid  #3f7bc9");
    }
    if(!nameFix.test(name)){
        $(".name-judge").css("opacity","1");
        $(".item-name a").css("background-color","#f05f40");
        $(".name-input").css("border","1px solid  #f05f40");
    }else{
        $(".name-judge").css("opacity","0");
        $(".item-name a").css("background-color","#3f7bc9");
        $(".name-input").css("border","1px solid  #3f7bc9");
    }
    if(!phoneFix.test(phone)){
        $(".phone-judge").css("opacity","1");
        $(".item-phone a").css("background-color","#f05f40");
        $(".phone-input").css("border","1px solid  #f05f40");
    }else{
        $(".phone-judge").css("opacity","0");
        $(".item-phone a").css("background-color","#3f7bc9");
        $(".phone-input").css("border","1px solid  #3f7bc9");
    }

}


