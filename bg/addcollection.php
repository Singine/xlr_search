<?php

include("util.php");
include ("wrongth.php");

session_start();

if (!checkLogin()) {
	Jump("acsearch.php");
	exit ;
}

if (isset($_GET['bookid'])) {
	$bookid = $_GET['bookid'];
	$acssid = $_SESSION['acssid'];
}
else {
	Jump("acsearch.php");
	exit ;
}

if (!checkCollected($bookid)) {

	$dbc = ConnectSQL();
	$query = "select * from collection where user_id = '".$acssid."'";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦1!');
	 if ($row = mysqli_fetch_array($result)) {
	 	$booklist = $row['book_id'];
	 	if ($booklist == "")
	 		$booklist .= $bookid;
	 	else
	 		$booklist .= '|'.$bookid;

	 	$query = "update collection set book_id = '".$booklist."' where user_id = '".$acssid."'";
	    $result = mysqli_query($dbc, $query)
	    	or die('oops!执行出错啦1!');
	 }

	 mysql_close($dbc);
	 
}

Jump("../display2.php?bookid=".$bookid);