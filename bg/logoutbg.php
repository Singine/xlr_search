<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/6
 * Time: 1:54
 * 处理退出后台
 */

include("wrongth.php");

$jumpto = "../acsearch.php";

session_start();
session_destroy();

Jump($jumpto);