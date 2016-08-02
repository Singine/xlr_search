<?php

include("util.php");
include ("wrongth.php");

session_start();

if (!checkLogin()) {
	Jump("acsearch.php");
	exit ;
}

if (isset($_GET['bookid']) && isset($_GET['friend_id'])) {
	$bookid = $_GET['bookid'];
	$acssid = $_SESSION['acssid'];
	$friend_id = $_GET['friend_id'];
} else {
	Jump("acsearch.php");
	exit ;
}


if (!checkIfFriend($friend_id) && !checkIfApplying($friend_id)) {

	$time = date('Y-m-d H:i', time());
	$dbc = ConnectSQL();
	$query = "insert into msgbox (msg_type, user_receive, user_send, status, msg_time) 
							values ('friendRequest', '".$friend_id."','".$acssid."','0','".$time."')";

    $result = mysqli_query($dbc, $query)
    	or die('oops!执行出错啦0!');

    mysql_close($dbc);
}

Jump("../display2.php?bookid=".$bookid);