<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/7
 * Time: 1:10
 * 通用函数
 */

/*
 * 00:00~5:00  夜深了
 * 05:00~12:00  早上好
 * 12:00~18:00  下午好
 * 18:00~00:00  晚上好
 */
function SayHi() {
    $time = (int)date("H");
    $hi = "你好";
    if ($time >= 0 && $time < 5)
        $hi = "夜深了";
    else if ($time >= 5 && $time < 12)
        $hi = "早上好";
    else if ($time >= 12 && $time < 18)
        $hi = "下午好";
    else if ($time >= 18 && $time < 24)
        $hi = "晚上好";
    echo $hi."，";
}