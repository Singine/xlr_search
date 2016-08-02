<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>老丁是猪！</title>
</head>

<body style="margin: 0px;background-color: #fafafa">
<?php
include("bg/util.php");
$dbc = ConnectSQL();
$query = "select catfoodtime from catbookfood";
$result = mysqli_query($dbc, $query)
or die('oops!出错啦0!');
while ($row = mysqli_fetch_array($result)) {
    $starttime = $row['catfoodtime'];
    $endtime = date("Y-m-d H:i:s", strtotime("$starttime + 1 month"));
    $now = date("Y-m-d H:i:s");
    $time = strtotime($endtime) - strtotime($now);
    $day = floor($time / 86400);
    $hour = floor($time % 86400 / 3600);
    $minute = floor($time % 86400 % 3600 / 60);
    $second = floor($time % 86400 % 60);
}
mysqli_close($dbc);
?>
<div style="position:absolute;width: 800px;height: 400px;left: 50%;margin-left:-400px;top: 50%;margin-top: -300px;">
    <div>
        <a>The order created on <?php echo $starttime; ?></a>
    </div>
    <div>
	<a>The deadline : <?php echo $endtime; ?></a>
    </div>
    <div>
	<a>There is </a>
	<a id="day">0<?php //echo $day; ?></a>
	<a>天 </a>
	<a id="hour">1<?php //echo $hour; ?></a>
	<a>时</a>
	<a id="minute">0<?php //echo $minute; ?></a>
	<a>分</a>
	<a id="second">0<?php //echo $second; ?></a>
	<a>秒</a>
    </div>
    <div>
        <a>Here time goes down:</a>
        <a id="laoding" ><?php echo $day." 天 ".$hour." 时 ".$minute." 分 ".$second." 秒"; ?></a>
    </div>

</div>
<script>

//var fun = setInterval("countDown()",1000);
var day = document.getElementById("day").innerHTML;
var hour = document.getElementById("hour").innerHTML;
var minute = document.getElementById("minute").innerHTML;
var second = document.getElementById("second").innerHTML;

var fun = setInterval("countDownSec()",1);

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

    document.getElementById("laoding").innerHTML = day + " 天 " + hour + " 时 " + minute + " 分 " + second + " 秒";
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
</body>
</html>
