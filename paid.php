<!DOCTYPE html>
<?php
include ("bg/wrongth.php");
session_start();
if (!isset($_SESSION['acssid']) || !isset($_SESSION['acnickname'])) {
    Jump("acsearch.php");
    exit;
}
?>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>欢迎</title>
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1700px)" href="css/UserIndex-L.css">
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1000px) and (max-width: 1700px)" href="css/UserIndex-M.css">
    <link type="text/css" rel="stylesheet" href="css/UserPost.css">
    <link type="text/css" rel="stylesheet" href="css/paid.css">

    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/settlement.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-2.1.1.min.js" ></script>
    <script src="js/userIndex.js"></script>
    <script src="js/userpost.js"></script>
    <script src="js/settlement.js"></script>
    <script src="js/paid.js"></script>
</head>
<body>
<div class="header" id="header">
    <div class="header-logo" onclick="location='acsearch.php'" style="cursor: pointer;"></div>
    <div class="nav" id="nav">
        <ul>
            <li class="nav-books-li nav-books-li-search"><div class="userSearch-bg"><input type="text" class="userSearch"></div><img class="searchUser-img"></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-1" href="acsearch.php">首页</a></li>
            <li class="nav-books-li "><a class="nav-books-li-a active" id="nav-books-li-a-2" href="userpost.php">我的发布</a></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-3" href="notice.php">消息</a></li>

            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-7" href="javascript:void(0)">意见反馈</a>
            </li>

            <li class="nav-books-li" id="logoutslide"><a class="nav-books-li-a" id="nav-books-li-a-3"
                                                         href="userindex.php"><?php echo $_SESSION['acnickname']; ?></a>

                <div class="logoutslide">
                    <div class="logouttriangle">
                    </div>
                    <div class="logoutslideimgbg">
                        <div class="logoutslideimg" onclick="location='userindex.php'">
                        </div>
                    </div>
                    <div class="logoutname">
                                                                         <span class="logoutname-a"
                                                                               onclick="location='userindex.php'"><?php
                                                                             include("bg/common.php");
                                                                             SayHi();
                                                                             echo $_SESSION['acnickname'];
                                                                             ?></span>
                    </div>
                    <hr class="logouthr">
                    <div class="logoutnotice"><span class="logoutnotice-span">私信：</span><span class="logoutnotice-a"
                                                                                              onclick="location='userindex.php'">21</span>
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
    <div class="content">

        <div class="display-box">
            <div class="content-main" style="border: 0;margin-right: auto;">
                <div class="content-title-line">
                    <div class="content-title"><hr class="title-top">
                        <a>结算</a>
                    </div>
                </div>

                <div class="display-board" style="overflow:hidden;">
                    <div class="paid-already">
                        <div class="paid-img"></div>
                        <div class="paid-text"><a>付款完成！</a></div>
                        <div class="paid-countdown"><a href="userindex.php" id="Btn">点击或将在 </a><span id="time">5</span><a href="userindex.php"> 秒后返回个人主页！</a></div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>

</body>
</html>