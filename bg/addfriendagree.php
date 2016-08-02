<?php

include("util.php");
include("wrongth.php");

session_start();

if (!checkLogin()) {
	Jump("acsearch.php");
	exit ;
}

if (isset($_GET['friend_id'])) {
	$acssid = $_SESSION['acssid'];
	$friend_id = $_GET['friend_id'];
} else {
	Jump("acsearch.php");
	exit ;
}


if (!checkIfFriend($friend_id)) {
	$dbc = ConnectSQL();

	// 把好友请求取消
	$query = "update msgbox set status = '1' where msg_type = 'friendRequest' and user_receive = '".$acssid."' and user_send = '".$friend_id."' and status = '0'";

	$result = mysqli_query($dbc, $query)
		or die('oops!执行出错啦1!');


	// 增加请求通过信息
	$time = date('Y-m-d H:i', time());

	$query = "insert into msgbox (msg_type, user_receive, user_send, status, msg_time) 
		values ('friendRequestPass', '".$friend_id."','".$acssid."','0','".$time."')";

	$result = mysqli_query($dbc, $query)
		or die('oops!执行出错啦2!');

	// 更新好友列表
	// 先找好友列表
	$query = "select * from friendlist where user_id = '".$acssid."'";
	$result = mysqli_query($dbc, $query)
		or die('oops!执行出错啦3!');

	// 找得到就查
    if ($row = mysqli_fetch_array($result)) {
    	$friend_string = $row['friend_string'];
    	if ($friend_string == "")
    		$friend_string .= $friend_id;
    	else
    		$friend_string .= '|'.$friend_id;

    	$query = "update friendlist set friend_string = '".$friend_string."' where user_id = '".$acssid."'";

		$result = mysqli_query($dbc, $query)
			or die('oops!执行出错啦1!');

    } else {
    	// 找不到 插一行
    	$query = "insert into friendlist (user_id, friend_string) values ('".$acssid."', '".$friend_id."')";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦5!');
    }

    // 更新对方好友列表
	// 先找好友列表
	$query = "select * from friendlist where user_id = '".$friend_id."'";
	$result = mysqli_query($dbc, $query)
		or die('oops!执行出错啦3!');

	// 找得到就查
    if ($row = mysqli_fetch_array($result)) {
    	$friend_string = $row['friend_string'];
    	if ($friend_string == "")
    		$friend_string .= $acssid;
    	else
    		$friend_string .= '|'.$acssid;

    	$query = "update friendlist set friend_string = '".$friend_string."' where user_id = '".$friend_id."'";

		$result = mysqli_query($dbc, $query)
			or die('oops!执行出错啦1!');

    } else {
    	// 找不到 插一行
    	$query = "insert into friendlist (user_id, friend_string) values ('".$friend_id."', '".$acssid."')";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦5!');
    }
	mysqli_close($dbc);
}

Jump("../notice.php");