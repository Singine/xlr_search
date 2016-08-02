<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 2016/1/4
 * Time: 20:00
 * 处理出错，弹框或跳转
 */

/**  跳转到$jumpto, 并且提示错误$alert */
function AlterAndJump($jumpto, $alert) {
    echo "<meta http-equiv='refresh' content='0;url=".$jumpto."'> ";
    echo "<SCRIPT LANGUAGE='javascript'>alert('".$alert."')</SCRIPT> ";
}

/**  跳转到$jumpto */
function Jump($jumpto) {
    echo "<meta http-equiv='refresh' content='0;url=".$jumpto."'> ";
}