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
    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/userIndex.js"></script>

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
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-2" href="useraddpost.php">我的发布</a></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-3" href="notice.php">消息</a>
            </li>

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
                                                                <span class="logoutname-a" onclick="location='userindex.php'"><?php
                                                                    include("bg/common.php");
                                                                    SayHi();
                                                                    echo $_SESSION['acnickname'];
                                                                    ?></span>
                                                            </div>
                                                            <hr class="logouthr">
                                                            <div class="logoutnotice"><span class="logoutnotice-span">私信：</span><span class="logoutnotice-a" onclick="location='userindex.php'"><?php 
                        $acssid = $_SESSION['acssid'];

                        $dbc = ConnectSQL();

                        $query = "select count(*) from msgbox where user_receive = '".$acssid."' and msg_type = 'chat' and status = '0'";

                        $result = mysqli_query($dbc, $query)
                            or die('oops!执行出错啦0!');

                        if ($row = mysqli_fetch_array($result)) {
                            echo $row['count(*)'];
                        }
                        mysqli_close($dbc);
                        ?></span></div>
                                                            <div class="logoutbtn"><span class="logoutbtn-a" onclick="location='bg/logoutbg.php'">注销</span></div>
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
                    <li class="user-id-left"><a>id:</a><a><?php echo $_SESSION['acssid']; ?></a></li>
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
                    <a>欢迎</a></div>
            </div>

            <div class="content-box">
                <div class="user-pic"></div>
                <div class="user-info">
                    <ul>
                        <li class="user-name">
                            <a>
                                <?php echo $_SESSION['acnickname']; ?>
                            </a>
                        </li>
                        <li class="user-id"><a>id:</a><a><?php echo $_SESSION['acssid']; ?></a></li>
                    </ul>
                </div>
                <div class="user-notice">
                    <ul>
                        <li class="user-msg"><a class="a-name" href="notice.php">私信:</a><span><?php 
                        $acssid = $_SESSION['acssid'];

                        $dbc = ConnectSQL();

                        $query = "select count(*) from msgbox where user_receive = '".$acssid."' and msg_type = 'chat' and status = '0'";

                        $result = mysqli_query($dbc, $query)
                            or die('oops!执行出错啦0!');

                        if ($row = mysqli_fetch_array($result)) {
                            echo $row['count(*)'];
                        } else
                            echo '0';
                        
                        ?></span></li>
                        <li class="user-goods"><a class="a-name" href="javascript:void(0)">懒件:</a><span><?php
                        $query = "select * from collection where user_id = '".$acssid."'";

                        $result = mysqli_query($dbc, $query)
                            or die('oops!执行出错啦0!');

                        if ($row = mysqli_fetch_array($result)) {
                            $str = $row['book_id'];

                            $tokens = explode('|', $str);
                            $collectionCnt = 0;
                            foreach ($tokens as $token) {
                                $collectionCnt++;
                            }

                            echo $collectionCnt;
                        } else {
                            $collectionCnt = 0;
                            echo $collectionCnt;
                        }

                        ?></span></li>
                        <li class="user-note"><a class="a-name" href="notice.php">通知:</a><span><?php echo countNotice(); ?></span></li>
                    </ul>
                </div>
                <div class="user-sign"><a class="btn2 btn-4" id="sign-a"><span id="sign">签到</span><span
                            id="signed">已签到</span></a></div>
                <div class="sign-note">
                    <p class="level">
                        <span class="Exp-now"></span>
                        <span class="Exp-total">Level.15 - Exp: 2472 / 2800 - Per: 35%</span>
                    </p>
                </div>
                <div class="statistics-img">
                    <div class="order-img"></div>
                    <div class="post-img"></div>
                    <div class="friends-img"></div>
                    <div class="favors-img"></div>
                </div>
                <div class="statistics">

                    <div class="statistics-left-1"><a>我的订单总数</a><span>0</span><a>Orders</a></div>
                    <div class="statistics-right-1"><a>我的发单总数</a><span><?php

                    $dbc = ConnectSQL();

                    $query = "select count(*) from catbookfood where catssid = '".$acssid."'";

                    $result = mysqli_query($dbc, $query)
                        or die('oops!执行出错啦0!');

                    if ($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    } else
                        echo '0';
                    ?></span><a>Posts</a></div>
                    <div class="statistics-left-2" style="cursor: pointer" onclick="window.location.href='friends.php'"><a>我的好友总数</a><span><?php

                    $query = "select * from friendlist where user_id = '".$acssid."'";

                    $result = mysqli_query($dbc, $query)
                        or die('oops!执行出错啦0!');

                    if ($row = mysqli_fetch_array($result)) {
                        $str = $row['friend_string'];

                        $tokens = explode('|', $str);
                        $cnt = 0;
                        foreach ($tokens as $token) {
                            $cnt++;
                        }

                        echo $cnt;
                    } else {
                        echo '0';
                    }

                    mysqli_close($dbc);
                    ?></span><a>Friends</a></div>
                    <div class="statistics-right-2"><a>我的收藏总数</a><span><?php echo $collectionCnt; ?></span><a>Favors</a></div>

                </div>
                <div class="downBTN">
                    <hr class="content-box-line">
                    <a class="downBTN-a" href="javascript:void(0)">点击查看统计</a></div>
            </div>
            <div class="content-title-line">

                <div class="content-title">
                    <hr class="title-top" style="border-top: 4px solid #4bb04b;">
                    <a>推荐</a></div>
            </div>
            <div class="content-box-recommend">

                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>
                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>
                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>
                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>
                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>
                <div class="recommend-box">
                    <div class="recommend-box-img"></div>
                    <div class="recommend-box-content">
                        <span>My Neighbor Totoro</span>
                        <a class="recommend-box-words">Two sisters move to the country with their father in order to be
                            closer to their hospitalized mother.</a>
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-left">
                            <a href="javascript:void(0)">删除</a>
                        </div>
                        <div class="recommend-box-btn-right">
                            <a href="javascript:void(0)">查看</a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
</body>
</html>