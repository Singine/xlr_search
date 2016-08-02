<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/6
 * Time: 17:58
 * 处理新的喵单后台
 */

include("wrongth.php");
include("util.php");

$jumpto = "../useraddpost.php";
$alert = "提交失败!";
$defaultpic = "recommend.jpg";

/** 没登录不得操作 */
session_start();
if (!isset($_SESSION['acssid']) || !isset($_SESSION['acphone'])) {
    Jump("../acsearch.php");
    exit;
} else {
    $ssid = $_SESSION['acssid'];
}

if (isset($_POST['addcatorder'])) {
    if (isset($_POST['addtitle']))
        $title = $_POST['addtitle'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addselection']))
        $type = $_POST['addselection'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addprice']))
        $price = $_POST['addprice'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addschool']))
        $school = $_POST['addschool'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addnew']))
        $new = $_POST['addnew'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addaddress']))
        $address = $_POST['addaddress'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addphone']))
        $phone = $_POST['addphone'];
    else {
        Jump($jumpto);
        exit;
    }

    if (isset($_POST['addcontent']))
        $detail = $_POST['addcontent'];
    else {
        Jump($jumpto);
        exit;
    }

    $file = $_FILES['addfile'];

    /** 检测信息合法性 */
    //包括ssid检测



    /**
     * 首先生成订单号
     * 图片的名字为订单号后面跟上图片序列号
     * 先把数据插入到数据库中
     * 如果成功则存下图片
     * 如果图片存储失败则删除数据库中插入的
     */
    $dbc = ConnectSQL();
    do {
        $id = date("YmdHis").rand(100,300);
        $query = "select catbookid from catbookfood where catbookid = '" . $id . "'";
        $result = mysqli_query($dbc, $query)
        or die('oops!出错啦1!');
    } while ($row = mysqli_fetch_array($result));

    /** 检测图片合法性 */
    $arrType = array('image/jpg', 'image/png', 'image/jpeg');         //图片格式
    $max_size = 1024*1024;                                            //定义大小1M
    $upfile = '../order/';                                            //文件在根目录中文件夹中

    if (!is_uploaded_file($file['tmp_name'])) {
        /**  没有上传图片，使用默认图片 */
        $picName = $defaultpic;
        $fullPath = $upfile.$picName;
        $uploaded_file = false;
    } else {
        /**  判断文件大小 */
        if ($file['size'] > $max_size) {
            AlterAndJump($jumpto, "文件太大，请重新上传!");
            exit;
        }
        /**  判断图片文件的格式 */
        if (!in_array($file['type'], $arrType)) {
            AlterAndJump($jumpto, "格式错误，请重新上传!");
            exit;
        } else {
            /**  记下格式后缀 */
            if ($file['type'] == 'image/jpg') {
                $format = ".jpg";
            } else if ($file['type'] == 'image/png') {
                $format = ".png";
            } else if ($file['type'] == 'image/jpeg') {
                $format = ".jpeg";
            } else {
                AlterAndJump($jumpto, "格式错误，请重新上传!");
                exit;
            }
        }
        $picName = $id."0".$format;
        $fullPath = $upfile.$picName;
        $uploaded_file = true;
    }

    $url = $picName."|";

    /**  数据库操作 */
    $time = date("Y-m-d H:i:s");

    $query = "insert into catbookfood (catbookid, catssid, catpub, catfood, catschool, catfoodold, catfoodhome, catfoodcon, catfoodurl, catfoodtime)" .
        " values ('$id', '$ssid', '$title', '$price', '$school', '$new', '$address', '$detail', '$url', '$time')";
    $result = mysqli_query($dbc, $query)
    or die('oops!出错啦2!');
    if (mysqli_affected_rows($dbc) != 1) {
        /**  删除存进去的 */
        $query = "delete from catbookfood where catbookid = '" . $id . "'";
        $result = mysqli_query($dbc, $query)
        or die('oops!出错啦3!');
        AlterAndJump($jumpto, $alert);
        mysqli_close($dbc);
        exit;
    }

    if ($uploaded_file && !move_uploaded_file($file['tmp_name'], $fullPath)){
        /**  存储图书失败 */
        $query = "delete from catbookfood where catbookid = '" . $id . "'";
        $result = mysqli_query($dbc, $query)
        or die('oops!出错啦4!');
        AlterAndJump($jumpto, "入库失败!!");
        mysqli_close($dbc);
        exit;
    }
    mysqli_close($dbc);
    Jump("../userpost.php");
    exit;
}

Jump($jumpto);