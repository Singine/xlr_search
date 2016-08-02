<!DOCTYPE html>
<?php
include ("bg/wrongth.php");
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
    <link type="text/css" rel="stylesheet" media="screen and (min-width: 1000px) and (max-width: 1700px)" href="css/UserIndex-M.css">
<!--    <link type="text/css" rel="stylesheet" media="screen and (max-width: 1300px)" href="css/UserIndex-S.css">-->
    <link type="text/css" rel="stylesheet" href="css/UserPost.css">
    <link type="text/css" rel="stylesheet" href="css/display.css">
    <link type="text/css" rel="stylesheet" href="css/userlogout.css">
    <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/display.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-2.1.1.min.js" ></script>
<!--    <script src="js/jquery.easing.min.js"></script>-->
    <script src="js/userIndex.js"></script>
    <script src="js/userpost.js"></script>
    <script src="js/display.js"></script>


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
                         <span class="logoutname-a" onclick="location='userindex.php'">
                         <?php
                             include("bg/common.php");
                             SayHi();
                             echo $_SESSION['acnickname'];
                        ?>
                        </span>
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
    <?php
    if (!isset($_GET['bookid']))
        Jump("acsearch.php");

    $id = $_GET['bookid'];

    // 这里应该进行转义和验证的工作

    include("bg/util.php");
    $dbc = ConnectSQL();
    $query = "select * from catbookfood where catbookid = '".$id."'";
    $result = mysqli_query($dbc, $query)
        or die('oops!执行出错啦0!');
    if ($row = mysqli_fetch_array($result)) {

        // time_count_down
        $starttime = $row['catfoodtime'];
        $endtime = date("Y-m-d H:i:s", strtotime("$starttime + 1 month"));
        $now = date("Y-m-d H:i:s");
        $time = strtotime($endtime) - strtotime($now);
        $day = floor($time / 86400);
        $hour = floor($time % 86400 / 3600);
        $minute = floor($time % 86400 % 3600 / 60);
        $second = floor($time % 86400 % 60);
        
        // get visitor_info

        // get user_info
        $user_id = $row['catssid'];

        $query = "select * from catformation where catssid = '".$user_id."'";
        $result = mysqli_query($dbc, $query)
            or die('oops!执行出错啦0!');
        if ($inRow = mysqli_fetch_array($result))
            $user_name = $inRow['catname'];
    ?>
    <div class="content">

        <div class="display-box">
            <div class="content-main" style="border: 0;margin-right: auto;">
                <div class="content-title-line">
                    <div class="content-title"><hr class="title-top">
                        <a>展示</a>
                    </div>
                </div>
                <div class="display-user" style="overflow:hidden;">
                    <div class="display-user-info">
                        <div class="display-user-img"></div>
                        <div class="display-user-name">
                            <a><?php echo $user_name; ?></a>
                        </div>
                        <div class="display-user-btn">
                        <?php
                        // applying
                        if (checkIfApplying($user_id)) {
                        ?>
                            <a class="btn2 btn-4 addFriend" id="display-user-add" href="javascrpt:;" style="background-color: rgb(184, 184, 184);"><span style="line-height: 0px;top:-12px;">申请中</span></a>
                        <?php
                        } else {

                            // already being friend
                            if (checkIfFriend($user_id)) {
                        ?>
                            <a class="btn2 btn-4 addFriend" id="display-user-add" href="javascrpt:;" style="background-color: rgb(184, 184, 184);"><span style="line-height: 0px;top:-12px;">已是好友</span></a>
                        <?php
                            } else {
                                // add friend       
                        ?>
                            <a class="btn2 btn-4 addFriend" id="display-user-add" href="bg/addfriend.php?bookid=<?php echo $id; ?>&friend_id=<?php echo $user_id; ?>"><span style="line-height: 0px;top:-12px;">添加好友</span></a>
                        <?php
                            }
                        }
                        ?>

                            <a class="btn2 btn-4 sendMsg-disabled"><span style="line-height: 0px;top:-12px;">发送私信</span></a>
                        </div>
                    </div>

                </div>
                <div class="display-board" style="overflow:hidden;">
                    <div class="display-order-box" id="111">
                        <div class="display-box-bg">
                            <div class="display-box-img-cover">
                                <a><?php echo $row['catfoodcon']; ?></a>
                            </div>
                            <div class="display-box-img"></div>

                        </div>
                        
                        <div class="booktag"></div>
                        <div class="display-content">
                            <div class="display-content-title"><a>书名：</a><a class="display-content-title-bookname"><?php echo $row['catpub']; ?></a></div>
                            <div class="display-content-price"><a>价格：</a><a class="display-content-title-bookprice"><?php echo $row['catfood']; ?></a></div>
                            <div class="display-content-btn">
                                <?php
                                if (!checkCollected($id))
                                {
                                ?>
                                    <a class="btn2 btn-4 collectNow<?php echo $time < 0? '-disabled': ''; ?>" href="bg/addcollection.php?bookid=<?php echo $id; ?>"><span style="line-height: 0px;top:-10px;">收藏</span></a>
                                    <a class="btn2 btn-4 buyNow<?php echo $time < 0? '-disabled': ''; ?>" href="settlement.php"><span style="line-height: 0px;top:-10px;">立即购买</span></a>
                                <?php
                                } else {
                                ?>
                                    <a class="btn2 btn-4 collectNow-disabled" href="javascript:;"><span style="line-height: 0px;top:-10px;">已收藏</span></a>
                                    <a class="btn2 btn-4 buyNow<?php echo $time < 0? '-disabled': ''; ?>" href="javascript:;"><span style="line-height: 0px;top:-10px;">立即购买</span></a>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                        <div class="booktag-content"></div>
                        
                        <!-- countdownStart -->
                        <?php
                        if ($time >= 0)
                        {
                        ?>
                        <div class="order-box-btntag">
                                <div style="display: none;">
                                    <a>There is </a>
                                    <a id="day"><?php echo $day; ?></a>
                                    <a>天 </a>
                                    <a id="hour"><?php echo $hour; ?></a>
                                    <a>时</a>
                                    <a id="minute"><?php echo $minute; ?></a>
                                    <a>分</a>
                                    <a id="second"><?php echo $second; ?></a>
                                    <a>秒</a>
                                </div>
                                <div class="timecountdownBox">
                                    <div id="timeDH">
                                        <a><?php echo $day ?></a>
                                        <a style="position: absolute;left: 30px;">D</a>
                                        <a style="position: absolute;left: 50px;"><?php echo $hour ?></a>
                                        <a style="position: absolute;left: 70px;">H</a>
                                    </div>
                                    <div id="timeMS">
                                        <a style="position: absolute;left: 10px;"><?php echo $minute ?></a>
                                        <a style="position: absolute;left: 30px;">M</a>
                                        <a style="position: absolute;left: 50px;"><?php echo $second ?></a>
                                        <a style="position: absolute;left: 70px;">S</a>
                                    </div>


                                </div>

                            <script>

                                var day = checkNum(document.getElementById("day").innerHTML);
                                var hour = checkNum(document.getElementById("hour").innerHTML);
                                var minute = checkNum(document.getElementById("minute").innerHTML);
                                var second = checkNum(document.getElementById("second").innerHTML);

                                var fun = setInterval("countDownSec()",1000);

                                function countDownSec() {
                                    if (second != 0) {
                                        second--;
                                        second = checkNum(second);
                                    } else {
                                        if (countDownMin()) {
                                            second = 59;
                                        } else
                                            clearInterval(fun);
                                    }

                                    document.getElementById("timeDH").innerHTML = day + " D " + hour + " H " ;
                                    document.getElementById("timeMS").innerHTML = minute + " M " + second + " S";
                                }

                                function countDownMin() {
                                    if (minute != 0) {
                                        minute --;
                                        minute = checkNum(minute);
                                        return true;
                                    } else {
                                        if (countDownHou()) {
                                            minute = 59;
                                            return true;
                                        }
                                        else
                                            return false;
                                    }
                                }

                                function countDownHou() {
                                    if (hour != 0) {
                                        hour--;
                                        hour = checkNum(hour);
                                        return true;
                                    } else {
                                        if (countDownDay()) {
                                            hour = 23;
                                            return true;
                                        }
                                        else
                                            return false;
                                    }
                                }

                                function countDownDay() {
                                    if (day != 0) {
                                        day--;
                                        return true;

                                    } else {
                                        return false;
                                    }
                                }

                                function checkNum(num) {
                                    if (num < 10)
                                        num = "0" + num;
                                    return num;
                                }

                            </script>
                        </div>
                        <?php
                        } else {
                        ?>
                        <!-- countdownEnd -->
                        <!-- closed -->
                        <div class="order-box-btntag-closed"></div>
                        <!-- End -->
                        <?php
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
    }
    mysqli_close($dbc);
    ?>

</div>

</body>
</html>