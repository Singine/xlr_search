<?php

include("util.php");
include ("wrongth.php");

session_start();

if (!checkLogin()) {
	Jump("acsearch.php");
	exit ;
}

if (isset($_POST['chat']) && isset($_POST['friend_id'])) {
	$chat = $_POST['chat'];
	$acssid = $_SESSION['acssid'];
	$friend_id = $_POST['friend_id'];
} else {
	Jump("acsearch.php");
	exit ;
}


if (checkIfFriend($friend_id)) {

	$time = date('Y-m-d H:i', time());
	$dbc = ConnectSQL();
	$query = "insert into msgbox (msg_type, user_receive, user_send, status, msg_time, msg_detail) 
							values ('chat', '".$friend_id."','".$acssid."','0','".$time."', '".$chat."')";

    $result = mysqli_query($dbc, $query)
    	or die('oops!执行出错啦0!');

    mysql_close($dbc);
}

Jump("../notice.php");