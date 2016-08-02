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
    <link type="text/css" rel="stylesheet" href="css/UserPost.css">
    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="js/jquery-2.1.1.min.js" ></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/userIndex.js"></script>
    <script src="js/userpost.js"></script>


</head>
<body>

<div class="header" id="header">
    <div class="header-logo" onclick="location='acsearch.php'" style="cursor: pointer;"></div>
    <div class="nav" id="nav">
        <ul>
            <li class="nav-books-li nav-books-li-search"><div class="userSearch-bg"><input type="text" class="userSearch"></div><img class="searchUser-img"></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-1" href="acsearch.php">首页</a></li>
            <li class="nav-books-li "><a class="nav-books-li-a active" id="nav-books-li-a-2" href="javascript:void(0)">我的发布</a></li>
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

                <div class="content-title"><hr class="title-top">
                    <a>发布</a>
                </div>
                <hr class="tag-cover" id="tag-id">
                <ul class="content-select-tag">
                  <li class="content-select-tag-li" id="left-tag"><span class="span-active"><i class="fa fa-angle-down" style="padding-right: 10px;"></i>当前订单</span></li>
                  <li class="content-select-tag-li" id="right-tag"><span class="span-normal"><i class="fa fa-angle-down" style="padding-right: 10px;"></i>历史订单</span></li>
                </ul>
                <div class="postBTN"><a href="useraddpost.php">发布喵单</a></div>
            </div>
            <div class="content-box-post" style="overflow:hidden;">


                <div class="order-box" id="111">

                    <div class="order-box-img"></div>
                    <div class="booktag"></div>
                    <div class="dotline"></div>
                    <div class="booktag-content"></div>
                    <div class="order-box-btntag"></div>
                </div>
                <div class="order-box">
                    <div class="order-box-img"></div>
                    <div class="booktag"></div>
                    <div class="dotline"></div>
                    <div class="booktag-content"></div>
                    <div class="order-box-btntag"></div>
                </div>
                <div class="order-box">
                    <div class="order-box-img"></div>
                    <div class="booktag"></div>
                    <div class="dotline"></div>
                    <div class="booktag-content"></div>
                    <div class="order-box-btntag"></div>
                </div>


            </div>

        </div>
    </div>
</div>

</body>
</html>