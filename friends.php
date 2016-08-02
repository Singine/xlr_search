<!DOCTYPE html>
<?php
include ("bg/wrongth.php");
include ("bg/util.php");

session_start();
if (!isset($_SESSION['acssid']) || !isset($_SESSION['acnickname'])) {
    Jump("acsearch.php");
    exit;
}
$acssid = $_SESSION['acssid'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎</title>
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1700px)" href="css/UserIndex-L.css">
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1300px) and (max-width: 1700px)" href="css/UserIndex-M.css">
    <link type="text/css" rel="stylesheet" media="screen and (max-width: 1300px)" href="css/UserIndex-S.css">
    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <link type="text/css" rel="stylesheet" href="css/notice.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/userIndex.js"></script>
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/notice.js"></script>
    <script type="text/javascript" src="js/friends.js"></script>
</head>
<body>
<div class="tipback-cover">
    <form action="/bg/addchat.php" method="post">
        <input class="user-id-reply" name="friend_id" type="hidden" value="">
        <div class="tipback-box">
            <div class="tipback-cross"><span><i class="fa fa-remove"></i></span></div>
            <div class="tipback-img-blank">
                <div class="tipback-img"></div>
            </div>
            <div class="tipback-content-blank">
                <a class="tipback-content-destination">回复 </a><span class="tipback-name" style="font-size: 15px;position: absolute;left: 120px;top: 5px;font-weight: bold;font-family: 微软雅黑;"></span>
                <textarea name="chat" placeholder="回复字数限一百字！"></textarea>
                <button class="btn2 btn-4 tipback-btn" style="background-color:#448ade;" type="submit"><span>回复</span></button>
            </div>
        </div>
    </form>
</div>
<div class="header" id="header">
    <div class="header-logo" onclick="location='acsearch.php'" style="cursor: pointer;"></div>
    <div class="nav" id="nav">
        <ul>
            <li class="nav-books-li nav-books-li-search">
                <div class="userSearch-bg"><input type="text" class="userSearch"></div>
                <img class="searchUser-img"></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-1" href="acsearch.php">首页</a></li>
            <li class="nav-books-li"><a class="nav-books-li-a" id="nav-books-li-a-2" href="userpost.php">我的发布</a></li>
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
                    <hr class="title-top" style="border-top: 4px solid #4bb04b;">
                    <a>好友</a></div>
            </div>
            <div class="content-box-recommend">

                <?php
                $dbc = ConnectSQL();

                $query = "select * from friendlist where user_id = '".$acssid."'";

                $result = mysqli_query($dbc, $query)
                    or die('oops!执行出错啦0!');

                if ($row = mysqli_fetch_array($result)) {
                    $friendList = $row['friend_string'];
                    
                    $friends = explode('|', $friendList);
                    foreach ($friends as $friend) {
                        $query = "select * from catformation where catssid = '".$friend."'";

                        $result = mysqli_query($dbc, $query)
                            or die('oops!执行出错啦1!');
                        if ($row = mysqli_fetch_array($result)) {
                            $userId = $row['catssid'];
                            $userName = $row['catnickname'];
                        }
                ?>


                <div class="recommend-box">
                    <div class="recommend-box-img" style="height: 160px;"></div>
                    <div class="recommend-box-content" style="text-align: center;padding: 0;width: 200px;">
                        <span style="position: relative;top: 10px;"><?php echo $userName; ?></span>
                        <input class="user-id" value="<?php echo $userId; ?>" style="display: none;" />
                    </div>
                    <div class="recommend-box-btn">
                        <div class="recommend-box-btn-right tipback-reply"  style="cursor:pointer;border-bottom-left-radius: 5px;border-bottom-right-radius: 0px;">
                            <a href="javascript:void(0)">私信</a>
                        </div>
                        <div class="recommend-box-btn-left" style="cursor:pointer;border-bottom-left-radius: 0px;border-bottom-right-radius: 5px;">
                            <a href="javascript:void(0)">删除</a>
                        </div>

                    </div>
                </div>

                <?php
                    }
                }
                ?>

            </div>

        </div>
    </div>
</div>
</body>
</html>