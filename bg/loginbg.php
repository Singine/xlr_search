<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/5
 * Time: 17:35
 * 处理登陆后台
 */

include("wrongth.php");
include("util.php");

$jumpto = "../acsearch.php";
$alert = "登录失败!";

if (isset($_POST['phone']))
    $phone = $_POST['phone'];
else {
    Jump($jumpto);
    exit;
}
if (isset($_POST['psw1']))
    $pwd = $_POST['psw1'];
else {
    Jump($jumpto);
    exit;
}

/**  检测规范 */
$reg = "/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/";
if (!preg_match($reg, $phone)) {
    AlterAndJump($jumpto, "手机出错啦!");
    exit;
}
$reg = "/^[a-z0-9]{32}$/";
if (!preg_match($reg, $pwd)) {
    AlterAndJump($jumpto, "密码出错啦!");
    exit;
}

/**  encode */
$encode = md5($phone . $pwd);
/** 转义 */
$temp = str_replace("'", "\\'", $encode);
$encode = $temp;
/** 双引号转义 */
$temp = str_replace("\"", "\\\"", $encode);
$encode = $temp;

$dbc = ConnectSQL();
$query = "select catssid, catphone, catnickname from catformation where catencode = '" . $encode . "'";
$result = mysqli_query($dbc, $query)
or die('oops!出错啦0!');

/**  防止md5重复 */
while ($row = mysqli_fetch_array($result)) {
    if ($row['catphone'] != $phone)
        continue;
    /** 登录成功 */
    session_start();
    $_SESSION['acssid'] = $row['catssid'];
    $_SESSION['acphone'] = $row['catphone'];
    $_SESSION['acnickname'] = $row['catnickname'];
    Jump($jumpto);
    mysqli_close($dbc);
    exit;
}
/** 失败 */
AlterAndJump($jumpto, "手机号或密码错误!");
mysqli_close($dbc);
exit;

