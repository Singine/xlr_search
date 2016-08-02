/**
 * Created by Rico on 2016/1/22.
 */

//methods
var bemethods = {

    PreList: function (pub) {
        var submitData = {
            pub: pub
        };
        $.ajax({
            type: 'POST',
            url: 'http://120.55.66.210:3210/prelist',
            contentType: "application/json",
            data: JSON.stringify(submitData),
            success: function (data) {
                $("#search_list").remove();

                if (data.length > 0) {
                    var i = 0;
                    var str = "<datalist id='search_list'>";
                    while (i < data.length || i > 3) {
                        var title = data[i].catpub;
                        str += "<option value='" + title + "' />";
                        i++;
                    }
                    str += "</datalist>";
                    $("#search-input").append(str);
                }
            }
        });
    },

    GetRows: function (pub) {

        var submitData = {
            pub: pub
        };

        var numOnPage = bemethods.GetNumOnPage();

        $.ajax({
            type: 'POST',
            url: 'http://120.55.66.210:3210/getrows',
            contentType: "application/json",
            data: JSON.stringify(submitData),
            success: function (data) {
                if (data.length > 0) {
                    var i = 0;
                    var row = 0;
                    while (i < data.length) {
                        var row = data[i].rows;
                        i++;
                    }
                    $("#paging").pagination({
                        items: row,
                        itemsOnPage: numOnPage,
                        cssStyle: 'light-theme'
                    });

                    $(".page").css("width", 5 * 30 + 140);
                }
            }
        });
    },

    SearchBooks: function (pub, page) {

        var numOnPage = bemethods.GetNumOnPage();

        var submitData = {
            pub: pub,
            page: page,
            pagenum: numOnPage
        };
        $.ajax({
            type: 'POST',
            url: 'http://120.55.66.210:3210/searchBooks',
            contentType: "application/json",
            data: JSON.stringify(submitData),
            success: function (data) {
                bemethods.StopLoading();
                $(".result-box").remove();
                $(".resultnotfound").remove();
                $("#paging").css("display", "none");
                if (data.length > 0) {
                    $("#paging").css("display", "block");
                    var i = 0;

                    while (i < data.length && i < numOnPage) {
                        var title = data[i].catpub;
                        var content = data[i].catfoodcon;
                        var price = data[i].catfood;
                        var bookid = data[i].catbookid;
                        $("#appendtag").append(

                            "<div class='result-box'>" +
                            // @dabei
                            "<a target='_blank' href='/display2.php?bookid=" + bookid +"'>" +
                            // @stop
                            "<div class='result-box-img'></div>" +
                            "<div class='result-box-content'>" +

                            "<div class='result-title-form'><span >" +
                            title +
                            "</span></div>" +
                            // @dabei
                            "</a>" +
                            // @stop
                            "<div class='result-price-form'><img class='price-coin' src='../images/coin.png' width='18' height='18'><a class='result-box-price'>" +
                            price +
                            "</a><a class='result-box-credit'>100%</a></div>" +
                            "<div class='result-words-form'><a class='result-box-words'>" +
                            content +
                            "</a></div>" +

                            "</div>" +
                            "</div>");
                        i++;
                    }
                } else {

                    $("#paging").css("display", "none");
                    $("#appendtag").append("<div class='resultnotfound'><span>未搜索到内容！</span></div>");

                }

            }
        });
    },

    GetWindowWidth: function () {
        return $(window).width();
    },

    GetNumOnPage: function () {
        var windowWidth = bemethods.GetWindowWidth();
        if (windowWidth < 1920 && windowWidth >= 1650)
            return 12;
        else if (windowWidth < 1650 && windowWidth >= 1380)
            return 10;
        else if (windowWidth < 1380 && windowWidth >= 1080)
            return 12;
        else if (windowWidth < 1080)
            return 12;
        return 12;
    },

    StartLoading: function () {
        bemethods.StopLoading();
        $("#appendtag").append("<div id='content-loading'>" +
            "<div class='spinner-base'>" +
            "</div>" +
            "<div class='spinner'>" +
            "<div class='rect1'></div>" +
            "<div class='rect2'></div>" +
            "<div class='rect3'></div>" +
            "<div class='rect4'></div>" +
            "<div class='rect5'></div>" +
            "<div class='rect6'></div>" +
            "<div class='rect7'></div>" +
            "</div>" +
            "</div>");
    },

    StopLoading: function () {
        $("#content-loading").remove();
    }

};

//start loading


//end loading