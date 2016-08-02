<!DOCTYPE html>
<?php
include ("bg/wrongth.php");
include ("bg/util.php");
session_start();
if (!isset($_SESSION['acssid']) || !isset($_SESSION['acnickname'])) {
    Jump("acsearch.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎</title>
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1700px)" href="css/UserIndex-L.css">
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1300px) and (max-width: 1700px)" href="css/UserIndex-M.css">
    <link type="text/css" rel="stylesheet" media="screen and (max-width: 1300px)" href="css/UserIndex-S.css">
    <link type="text/css" rel="stylesheet" href="css/UserAddPost.css">
    <link type="text/css" rel="stylesheet" href="css/school.css">
    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/school.js"></script>
    <script src="js/judgement.js"></script>
    <!--<script src="js/jquery-2.1.1.min.js" ></script>-->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/userIndex.js"></script>
    <script src="js/AddPostBTN.js"></script>


</head>
<body>
<div class="header" id="header">
    <div class="header-logo" onclick="location='acsearch.php'" style="cursor: pointer;"></div>
    <div class="nav" id="nav">
        <ul>
            <li class="nav-books-li nav-books-li-search">
                <div class="userSearch-bg"><input type="text" class="userSearch"></div>
                <img class="searchUser-img"></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-1" href="acsearch.php">首页</a></li>
            <li class="nav-books-li "><a class="nav-books-li-a active" id="nav-books-li-a-2" href="userpost.php">我的发布</a>
            </li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-3" href="notice.php">消息</a>
            </li>

            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-7" href="javascript:void(0)">意见反馈</a>
            </li>

            <li class="nav-books-li" id="logoutslide"><a class="nav-books-li-a" id="nav-books-li-a-3" href="userindex.php"><?php echo $_SESSION['acnickname']; ?></a>

                <div class="logoutslide">
                    <div class="logouttriangle">
                    </div>
                    <div class="logoutslideimgbg">
                        <div class="logoutslideimg" onclick="location='userindex.php'">
                        </div>
                    </div>
                    <div class="logoutname">
                        <span class="logoutname-a" onclick="location='userindex.php'"><?php
                            include("bg/common.php");
                            SayHi();
                            echo $_SESSION['acnickname'];
                            ?>
                        </span>
                    </div>
                    <hr class="logouthr">
                    <div class="logoutnotice"><span class="logoutnotice-span">私信：</span><span class="logoutnotice-a"
                                                                                              onclick="location='userindex.php'"><?php 
                        $acssid = $_SESSION['acssid'];

                        $dbc = ConnectSQL();

                        $query = "select count(*) from msgbox where user_receive = '".$acssid."' and msg_type = 'chat' and status = '0'";

                        $result = mysqli_query($dbc, $query)
                            or die('oops!执行出错啦0!');

                        if ($row = mysqli_fetch_array($result)) {
                            echo $row['count(*)'];
                        }
                        mysqli_close($dbc);
                        ?></span>
                    </div>
                    <div class="logoutbtn"><span class="logoutbtn-a" onclick="location='bg/logoutbg.php'">注销</span>
                    </div>
                </div>
            </li>
        </ul>
        <div class="fixedTip2">
            <div class="close2"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="leftMenu">
        <div class="user-info-left">
            <div class="info-left-img"></div>
            <div class="info-left-cover">
                <div class="info-left-add"></div>
            </div>
            <div class="info-left-name">
                <ul>
                    <li class="user-name-left"><a><?php echo $_SESSION['acnickname']; ?></a></li>
                    <li class="user-id-left"><a>id:</a><a>201210314059</a></li>
                </ul>
            </div>
            <div class="user-words"><a>I'm here, as always!</a></div>
            <div class="user-input"><input placeholder="更改您的个性签名！"></div>
            <div class="user-write"></div>
        </div>
        <div class="menu-left">
            <ul class="menu-left-ul">
                <li><a href="userindex.php" class="btn3 btn-5 menu-main" id="menu_1" name="1"><span>欢迎</span></a></li>
                <li><a href="acsearch.php" class="btn3 btn-5 menu-main" id="menu_2" name="2"><span>搜索</span></a></li>
                <li><a class="btn3 btn-5 menu-main" id="menu_3" name="3" href="javascript:void(0)"><span>消息</span></a>
                    <ul class="menu-left-ul-inside" id="menu_inside_3">
                        <li><a class="btn3 btn-5 menu-inside" title="3" href="notice.php"><span>私信</span></a></li>
                        <li><a class="btn3 btn-5 menu-inside" title="3" href="notice.php"><span>通知</span></a></li>
                    </ul>
                </li>
                <li><a class="btn3 btn-5 menu-main" id="menu_4" href="friends.php" name="4"><span>好友</span></a></li>

            </ul>

        </div>
    </div>
    <div class="content">
        <div class="content-bg"></div>
        <div class="content-main">
            <div class="content-title-line">
                <div class="content-title">
                    <hr class="title-top">
                    <a>新的喵单</a></div>
            </div>
            <div>
                <form id="order-form" action="bg/newcatorderbg.php" method="post" enctype="multipart/form-data">
                    <div class="content-box-add">

                        <div class="item-title">
                            <div class="item-title-box"><a>标题</a><input id="titleJudge" name="addtitle" class="title-input" placeholder="请输入标题名！" easyform="title;" message="标题应由6-20位中英文组成，请勿使用特殊字符！" easytip="theme:black;" maxlength="20"></div>
                        </div>
                        <hr class="cutline">
                        <div class="item-select">
                            <div class="item-select-box">
                                <a>类目</a>
                                <div class="item-select-box-btn">
                                    <button type="button" class="select-btn" id="select-btn-1" value="1">二手书</button>
                                    <button type="button" class="select-btn" id="select-btn-2" value="2">二手车</button>
                                    <button type="button" class="select-btn" id="select-btn-3" value="3">校园通</button>
                                    <input id="select-input" name="addselection" hidden>
                                </div>
                                <div class="select-judge">
                                    <div class="triangle"></div>
                                    <span id="selectInfo">必选！</span></div>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="item-price-box">
                                <a class="a-price">定价</a>
                                <div class="item-price-box-input">
                                    <input id="priceJudge" name="addprice" class="price-input" onchange="verify();"
                                           maxlength="6">
                                </div>
                                <a class="a-yuan">元</a>
                            </div>
                            <div class="price-judge">
                                <div class="triangle"></div>
                                <span id="priceInfo">请输入适当的价格！</span></div>
                        </div>
                        <hr class="cutline">
                        <div class="item-location">
                            <div class="item-location-box">
                                <a>学校</a>
                                <div class="item-location-box-btn">

                                    <input type="text" id="school" name="addschool" class="school-input"
                                           onchange="verify();" placeholder="请点击选择学校" readonly/>
                                    <div class="school-judge">
                                        <div class="triangle"></div>
                                        <span id="schoolInfo">请选择学校！</span></div>
                                    <div id="proSchool" class="provinceSchool">
                                        <div class="title"><span>请选择学校</span></div>
                                        <div class="proSelect">
                                            <select></select>
                                            <span>如没找到选择项，请选择其他手动填写</span>
                                            <input type="text">
                                        </div>
                                        <div class="schoolList">
                                            <ul></ul>
                                        </div>
                                        <div class="button">
                                            <button flag='0'>取消</button>
                                            <button flag='1'>确定</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr class="cutline">
                        <div class="item-new item-3">
                            <div class="item-new-box">
                                <a>新旧</a>
                                <div class="item-new-box-btn">
                                    <button type="button" class="new-btn" id="new-btn-1" value="1">非全新</button>
                                    <button type="button" class="new-btn" id="new-btn-2" value="2">全新</button>
                                    <input id="new-input" name="addnew" hidden>
                                </div>

                            </div>
                            <div class="new-judge">
                                <div class="triangle"></div>
                                <span id="newInfo">必选！</span></div>
                        </div>

                        <hr class="cutline item-3">
                        <div class="item-address item-3">
                            <div class="item-address-box">
                                <a>具体地址</a>
                                <div class="item-address-box-text">
                                    <textarea name="addaddress" maxlength="60"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="cutline item-3">
                        <div class="item-name">
                            <div class="item-name-box"><a>姓名</a><input class="name-input" id="nameJudge" name="addname"
                                                                       onchange="verify();" placeholder="请输入姓名！">
                                <div class="name-judge">
                                    <div class="triangle"></div>
                                    <span id="nameInfo">请输入姓名！</span></div>
                            </div>

                        </div>
                        <hr class="cutline">
                        <div class="item-phone">
                            <div class="item-phone-box"><a>联系方式</a><input class="phone-input" id="phoneJudge"
                                                                          name="addphone" onchange="verify();"
                                                                          placeholder="请输入联系方式！">
                                <div class="phone-judge">
                                    <div class="triangle"></div>
                                    <span id="phoneInfo">请输入联系方式！</span></div>
                            </div>
                        </div>
                        <hr class="cutline">
                        <div class="item-details">
                            <div class="item-details-box">
                                <a>详细描述</a>
                                <div class="item-details-box-text">
                                    <textarea name="addcontent" maxlength="400"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="cutline">
                        <div class="item-pic">
                            <div class="item-pic-box">
                                <a>图片</a>
                                <div class="item-pic-box-input">
                                    <input type="file" name="addfile">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="PostSubmit">
                        <input type="submit" name="addcatorder" class="PostSubmitBtn" value="提交喵单">
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#order-form').easyform();
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>