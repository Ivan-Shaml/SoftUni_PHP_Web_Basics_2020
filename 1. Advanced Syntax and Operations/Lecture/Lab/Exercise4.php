<?php
$arr = [];
$arr = explode(" ",readline());

for ($i=0; $i<count($arr); $i++){
    echo $arr[$i]." => ".round($arr[$i], 0,PHP_ROUND_HALF_UP).PHP_EOL;
}