<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>喵单详情</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/buttom.css">
    <link type="text/css" rel="stylesheet" href="css/ACSearch.css">
    <link type="text/css" rel="stylesheet" href="css/register.css">
    <link type="text/css" rel="stylesheet" href="css/simplePagination.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/md5.js"></script>
    <script src="js/resize.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/animation.js"></script>
    <script src="js/XLR_Search.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/easyform.js"></script>
    <script src="js/SearchResult.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>
    <link href='http://fonts.useso.com/css?family=Raleway:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/cs-select.css"/>
    <link rel="stylesheet" type="text/css" href="css/cs-skin-slide.css"/>
    <script src="js/jquery.simplePagination.js"></script>
</head>
<body style="overflow-y: scroll">

<div class="reflactCorner">
    <div class="cornerBTN cornerBTN-content" id="topBTN">
        <a href="javascript:void(0)" class="cornerBTN-a" id="topBTN-a">TOP</a>
    </div>
    <div class="cornerBTN cornerBTN-content" id="catBTN">
        <a href="javascript:void(0)" class="cornerBTN-a" id="catBTN-a">猫窝</a>
    </div>
    <div class="cornerBTN cornerBTN-content" id="reflactBTN">
        <a href="javascript:void(0)" class="cornerBTN-a" id="reflactBTN-a">意见反馈</a>
    </div>
    <div class="cornerBTN cornerBTN-base">
        <div id="cornerPic"></div>
    </div>
</div>
<div class="header-books" id="header-books">
    <div class="search-min"><input type="text" class="search-min-input"><div class="search-min-btn"></div></div>
    <div class="nav-books" id="nav-books">

        <ul>


            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-1" href="index.php">关于</a></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-2" href="javascript:void(0)">筛选</a>
            </li>
            <?php
            if (isset($_SESSION['acssid']) && isset($_SESSION['acnickname'])) {
                ?>
            <li class="nav-books-li" id="logoutslide"><a class="nav-books-li-a" id="nav-books-li-a-3" href="userindex.php"><?php echo $_SESSION['acnickname']; ?></a>
                <div class="logoutslide">
                    <div class="logouttriangle">
                    </div>
                    <div class="logoutslideimgbg">
                        <div class="logoutslideimg">
                        </div>
                    </div>
                    <div class="logoutname">
                        <a class="logoutname-a">早上好，<?php echo $_SESSION['acnickname']; ?>！</a>
                    </div>
                    <hr class="logouthr">
                    <div class="logoutnotice"><span>私信：</span><a>21</a></div>
                    <div class="logoutbtn"><a href="bg/logoutbg.php">注销</a></div>
                </div>
            </li>
            <?php
            } else {
                ?>
            <li class="nav-books-li"><a class="nav-books-li-a" id="cd-popup-trigger"
                                        href="javascript:void(0)">登录|注册</a>
            </li>
            <?php
            }
            ?>
        </ul>
        <div class="fixedTip2">
            <div class="close2"></div>
        </div>
    </div>
</div>

<div class="headImage-books" id="div-resize">
    <div class="img-cover" id="img-cover">

        <div class="searchLogo"></div>


        <div class="search">
            <div class="fixedTip1">
                <div class="close1"></div>
            </div>
            <div class="search1">
                <!--<b class="pic" id="pic"></b>-->

                <section class="list-section" id="select-menu">

                    <select class="cs-select cs-skin-slide">
                        <option value="sightseeing" data-class="icon-camera">二手书</option>
                        <option value="business" data-class="icon-money">二手车</option>
                        <option value="honeymoon" data-class="icon-heart">校园通</option>
                    </select>
                </section>

                <script>
                    (function () {
                        [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
                            new SelectFx(el);
                        });
                    })();
                </script>
            </div>
            <div class="search2">
                <input class="search-input" id="search-input" type="text" placeholder="请输入您要搜索的内容！">
                <!--<hr class="search-hr" width=1 size=35>-->
                <input id="searchClick" class="search-button" type="submit" value="" src="javascript:void(0)">
                <a class="btn2 btn-4"><span>搜索</span></a>
            </div>
        </div>

    </div>
</div>

<div class="cd-popup" role="alert" style="z-index:39">
    <div class="cd-popup-container">
        <div class="accordion-wrap">
            <div class="accordion" style="overflow:visible;border-radius:0px; ">
                <a href="javascript:void(0)"><i class="fa fa-user"></i>登录</a>

                <div class="nav profile">
                    <div class="form-div">
                        <form id="login-form" action="bg/loginbg.php" method="post">

                            <table style="z-index: 9999">
                                <tr>
                                    <td>手机号</td>
                                    <td><input name="phone" maxlength="11" type="text" id="uid_1" easyform="phone;"  message="请输入正确的手机号！" easytip="theme:black;"></td>
                                </tr>

                                <tr>
                                    <td>密码</td>
                                    <td><input name="psw1" maxlength="32" type="password" id="psw1_1"  easyform="length:6-16;real-time;" message="密码必须为6—16位"  easytip="theme:black;"></td>
                                </tr>

                            </table>

                            <div class="buttons" style="width: 424px">
                                <input value="登 录" name="login" type="submit" style="margin:0 auto; margin-top:20px;"/>


                            </div>

                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#login-form').easyform();
                                });

                            </script>
                            <br class="clear">
                        </form>
                    </div>

                </div>
                <a href="javascript:void(0)"><i class="fa fa-comments"></i>注册</a>

                <div class="nav">
                    <div class="form-div">
                        <form id="reg-form" action="bg/registerbg.php" method="post">
                            <table style="z-index: 9999">
                                <tr>
                                    <td>手机号</td>
                                    <td><input name="phone" maxlength="11" type="text" id="uid" onblur="loseFocus()"
                                               easyform="phone;real-time;" message="请输入正确的手机号！" easytip="theme:black;"
                                               ajax-message="用户名已存在!">
                                    </td>
                                    <div id="123321" class="fuck"></div>
                                </tr>
                                <tr>
                                    <td>密码</td>
                                    <td><input name="psw1" maxlength="32" type="password" id="psw1"
                                               easyform="length:6-16;real-time;" message="密码必须为6—16位"
                                               easytip="theme:black;"></td>
                                </tr>
                                <tr>
                                    <td>确认密码</td>
                                    <td><input name="psw2" maxlength="32" type="password" id="psw2"
                                               easyform="length:6-16;equal:#psw1;" message="两次密码输入要一致"
                                               easytip="theme:black;"></td>
                                </tr>
                                <tr>
                                    <td>姓名</td>
                                    <td><input name="name" maxlength="11" type="text" id="email"
                                               easyform="name;real-time;" message="请输入正确的姓名！" easytip="theme:black;">
                                    </td>
                                </tr>
                                <tr class="sex">
                                    <td>性别</td>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="gender" value="0" checked><span>男</span></li>
                                            <li><input type="radio" name="gender" value="1"><span>女</span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>昵称</td>
                                    <td><input name="nickname" maxlength="16" type="text" id="nickname"
                                               easyform="length:1-8;real-time;" message="昵称为1-8个字！(中文按一个字计算)"
                                               easytip="theme:black;"></td>
                                </tr>
                            </table>

                            <div class="buttons" style="width: 424px">
                                <input value="注 册" name="register" type="submit" style=" margin-left:40% ">

                            </div>

                            <br class="clear">
                        </form>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#reg-form').easyform();
                        });

                        function loseFocus(){

                            var request = new XMLHttpRequest();
                            request.open("POST", "ajax_signup.php");
                            var data = "phoneNumber=" + document.getElementById("uid").value;
                            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            request.send(data);

                            request.onreadystatechange = function() {
                                if (request.readyState===4) {
                                    if (request.status===200) {
                                        document.getElementById("123321").innerHTML = request.responseText;
                                        var empty = document.getElementById('123321').innerHTML;


                                    } else {
                                        alert("发生错误：" + request.status);

                                    }

                                }
                                if(empty=="") {
                                    document.getElementById("123321").style.opacity = "0";
                                }else{
                                    document.getElementById("123321").style.opacity="1";

                                }
                            }




                        }
                    </script>
                </div>

            </div>
        </div>


    </div>
</div>

<div id="searchResult">

    <div class="resultbg">
        <div class="resultcover"></div>
    </div>
    <div class="resultcontainer">
        <div class="content-title-line">

            <div class="content-title">
                <hr class="title-top">
                <a>搜索</a></div>
        </div>
        <div id="appendtag"></div>


        <br id="appendbr" style="clear: both">

        <div id="paging" class="page"></div>

    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#paging").pagination({
            items: 50,
            itemsOnPage: 10,
            cssStyle: 'light-theme'
        });

        $(".page").css("width", 5 * 30 + 140);
    });
</script>
</body>
</html>