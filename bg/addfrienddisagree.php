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



$dbc = ConnectSQL();
$query = "update msgbox set status = '1' where msg_type = 'friendRequest' and user_receive = '".$acssid."' and user_send = '".$friend_id."' and status = '0'";

$result = mysqli_query($dbc, $query)
	or die('oops!执行出错啦0!');

mysqli_close($dbc);

Jump("../notice.php");