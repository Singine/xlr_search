<?php
header("Content-Type: text/plain;charset=utf-8");
/**
 * Created by huang.
 * User: Rico
 * Date: 2016/1/5
 * Time: 16:41
 * 处理注册ajax
 */

include("bg/util.php");

if (isset($_POST['phoneNumber']))
    $A_number = $_POST['phoneNumber']; //接受用户注册时输入的手机号码
else
    exit;

/**  检测规范 */
$reg = "/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/";
if (!preg_match($reg, $A_number)) {
    exit;
}
/** 单引号转义 */
$temp = str_replace("'", "\\'", $A_number);
$A_number = $temp;
/** 双引号转义 */
$temp = str_replace("\"", "\\\"", $A_number);
$A_number = $temp;

$dbc = ConnectSQL();

$query1 = "select catphone from catformation where catphone='" . $A_number . "'";
$info1 = mysqli_query($dbc, $query1)
or die('oops!出错啦0!');


if ($row = mysqli_fetch_array($info1)) {                    //如果管理员名称或密码不正确，则弹出相关提示信息

    echo "<div class=\"ajaxtip\"><div class=\"triangle\"></div><span>您输入的手机号已被注册！</span></div>";
    exit;
}

?>



