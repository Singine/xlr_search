<?php

include("util.php");
include ("wrongth.php");

session_start();

if (!checkLogin()) {
	Jump("acsearch.php");
	exit ;
}

if (isset($_GET['friendid'])) {
	$friendid = $_GET['friendid'];
	$acssid = $_SESSION['acssid'];
}
else {
	Jump("acsearch.php");
	exit ;
}

// 先删自己的好友列表
$dbc = ConnectSQL();
$query = "select * from friendlist where user_id = '".$acssid."'";
$result = mysqli_query($dbc, $query)
	or die('oops!执行出错啦1!');

if ($row = mysqli_fetch_array($result)) {
 	$friends = $row['friend_string'];
 	

 	$friends = stringDelete($friends, $friendid);

 	$query = "update friendlist set friend_string = '".$friends."' where user_id = '".$acssid."'";
    $result = mysqli_query($dbc, $query)
    	or die('oops!执行出错啦2!');
}

// 删好友的
$query = "select * from friendlist where user_id = '".$friendid."'";
$result = mysqli_query($dbc, $query)
	or die('oops!执行出错啦1!');

if ($row = mysqli_fetch_array($result)) {
 	$friends = $row['friend_string'];
 	

 	$friends = stringDelete($friends, $acssid);

 	$query = "update friendlist set friend_string = '".$friends."' where user_id = '".$friendid."'";
    $result = mysqli_query($dbc, $query)
    	or die('oops!执行出错啦2!');
}





mysql_close($dbc);
	 


Jump("../friends.php");
