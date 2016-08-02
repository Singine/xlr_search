<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/4
 * Time: 21:49
 */

header('Content-Type:text/html; charset=UTF-8;');

function ConnectSQL()
{
    $dbc = mysqli_connect('localhost', 'achao', 'nishiLAJI7023', 'agentcatdb')
    or die('oops!出错啦!');
    mysqli_query($dbc,"SET NAMES UTF8");
    return $dbc;
}

function checkLogin()
{
	if (isset($_SESSION['acssid']) && isset($_SESSION['acnickname']))
		return true;
	else
		return false;
}

function checkCollected($bookid)
{

	if (!checkLogin())
		return false;

	$acssid = $_SESSION['acssid'];

	$dbc = ConnectSQL();
	$query = "select * from collection where user_id = '".$acssid."'";
    $result = mysqli_query($dbc, $query)
    	or die('oops!执行出错啦0!');

    $cc = true;
    // 找得到就查
    if ($row = mysqli_fetch_array($result))
    {
		$query = "select * from collection where user_id = '".$acssid."' and book_id like '%".$bookid."%'";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦1!');
	    $cc = mysqli_fetch_array($result)? true: false;

    // 找不到 插一行
    } else {
    	$query = "insert into collection (user_id) values ('".$acssid."')";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦2!');
    	$cc = false;
    }

    mysqli_close($dbc);

    return $cc;
}

function checkIfFriend($friend_id)
{

    if (!checkLogin())
        return false;

    $acssid = $_SESSION['acssid'];

    $dbc = ConnectSQL();
    $query = "select * from friendlist where user_id = '".$acssid."' and friend_string like '%".$friend_id."%'";
    $result = mysqli_query($dbc, $query)
        or die('oops!执行出错啦0!');

    $cc = false;
    // 是朋友
    if ($row = mysqli_fetch_array($result))
        $cc = true;

    mysqli_close($dbc);

    return $cc;
}

function checkIfApplying($friend_id)
{

    if (!checkLogin())
        return false;

    $acssid = $_SESSION['acssid'];

    $dbc = ConnectSQL();
    
    $query = "select * from msgbox where user_send = '".$acssid."' and user_receive = '".$friend_id."' and msg_type = 'friendRequest' and status = '0'";
    $result = mysqli_query($dbc, $query)
        or die('oops!执行出错啦0!');

    $cc = false;
    // 正在申请
    if ($row = mysqli_fetch_array($result))
        $cc = true;

    mysqli_close($dbc);

    return $cc;
}

function countNotice()
{

    if (!checkLogin())
        return false;

    $acssid = $_SESSION['acssid'];

    $dbc = ConnectSQL();
    $query = "select count(*) from msgbox where user_receive = '".$acssid."' and msg_type = 'friendRequest' and status = '0'";
    $result = mysqli_query($dbc, $query)
        or die('oops!执行出错啦0!');

    if ($row = mysqli_fetch_array($result))
        $cnt = $row['count(*)'];
    else
        $cnt = 0;

    return $cnt;
}

function stringDelete($str, $deletedStr)
{
    if ($str == '')
        return $str;

    $newStr = '';

    $tokens = explode('|', $str);
    foreach ($tokens as $token) {
        if ($token == $deletedStr)
            continue;
        if ($newStr == '')
            $newStr = $token;
        else
            $newStr .= '|'.$token;
    }

    return $newStr;

}