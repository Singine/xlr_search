<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/4
 * Time: 19:41
 * 处理注册后台
 */

include("wrongth.php");
include("util.php");

$jumpto = "../acsearch.php";
$alert = "注册失败!";

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
if (isset($_POST['psw2']))
    $pwdrep = $_POST['psw2'];
else {
    Jump($jumpto);
    exit;
}
if (isset($_POST['name']))
    $name = $_POST['name'];
else {
    Jump($jumpto);
    exit;
}
if (isset($_POST['gender']))
    $gender = $_POST['gender'];
else {
    Jump($jumpto);
    exit;
}
if (isset($_POST['nickname']))
    $nickname = $_POST['nickname'];
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
if ($pwd != $pwdrep) {
    AlterAndJump($jumpto, "重复密码错啦!");
    exit;
}

/** 名字还需要匹配一下 */
//$reg = "/^[\\u4E00-\\u9FA5]{2,4}$/";
//$reg = "[\\u4E00-\\u9FA5]{2,5}(?:·[\\u4E00-\\u9FA5]{2,5})*";
//if (!$lmj = preg_match($reg, $name)) {
//    AlterAndJump($jumpto, "名字出错啦!".$lmj);
//    exit;
//}
if (strlen($name) < 4 && strlen($name) > 8) {
    AlterAndJump($jumpto, "名字出错啦!");
    exit;
}
$temp = str_replace("'", "\\'", $name);
$name = $temp;
/** 双引号转义 */
$temp = str_replace("\"", "\\\"", $name);
$name = $temp;

$reg = "/^[01]{1}$/";
if (!preg_match($reg, $gender)) {
    AlterAndJump($jumpto, "性别出错啦!");
    exit;
}
if (strlen($nickname) < 1 && strlen($nickname) > 16) {
    AlterAndJump($jumpto, "昵称出错啦!");
    exit;
}
/** 单引号转义 */
//preg_replace("正则","替换内容","原字符串");
//str_replace(find,replace,string,count)参数 描述
//find 必需。规定要查找的值。
//replace 必需。规定替换 find 中的值的值。
//string 必需。规定被搜索的字符串。
//count 可选。一个变量，对替换数进行计数。
$temp = str_replace("'", "\\'", $nickname);
$nickname = $temp;
/** 双引号转义 */
$temp = str_replace("\"", "\\\"", $nickname);
$nickname = $temp;

/**  encode */
$encode = md5($phone . $pwd);
/**  手机号码重复性 */
$dbc = ConnectSQL();
$query = "select catphone from catformation where catphone = '" . $phone . "'";
$result = mysqli_query($dbc, $query)
or die('oops!出错啦0!');
if (!$row = mysqli_fetch_array($result)) {
    do {
        $id = "1".date("md") . rand(10000, 50000);
        $query = "select catssid from catformation where catssid = '" . $id . "'";
        $result = mysqli_query($dbc, $query)
        or die('oops!出错啦1!');
    } while ($row = mysqli_fetch_array($result));
    $regdate = date("Y-m-d H:i:s");

    $query = "insert into catformation (catssid, catname, catgender, catnickname, catphone, catpwd, catencode, catregdate, catbloody)" .
        " values ('$id', '$name', '$gender', '$nickname', '$phone', '$pwd', '$encode', '$regdate', '100')";
    $result = mysqli_query($dbc, $query)
    or die('oops!出错啦2!');
    if (mysqli_affected_rows($dbc) != 1) {
        /**  删除存进去的 */
        $query = "delete from catformation where catssid = '" . $id . "'";
        $result = mysqli_query($dbc, $query)
        or die('oops!出错啦3!');
        AlterAndJump($jumpto, $alert);
        mysqli_close($dbc);
        exit;
    }
    /** 注册成功 */
    session_start();
    $_SESSION['acssid'] = $id;
    $_SESSION['acphone'] = $phone;
    $_SESSION['acnickname'] = $nickname;
    mysqli_close($dbc);
    Jump($jumpto);
    exit;
} else {
    AlterAndJump($jumpto, "手机号已注册!");
    mysqli_close($dbc);
    exit;
}

mysqli_close($dbc);
Jump($dbc);