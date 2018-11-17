<?php
/**
 * Created by PhpStorm.
 * User: gurikin
 * Date: 15.11.18
 * Time: 23:21
 */
$t = time();
echo strftime("%H:%M:%S", $t) . "<hr>";
$list = array();
for ($i=0;$i<10000;$i++) {
    $list[$i] = rand(0,60000000);
}
sort($list);
print_r($list);

echo "<hr>";
require_once("memory.php");
echo "<hr>";
$t = time();
echo strftime("%H:%M:%S", $t) . "<hr>";