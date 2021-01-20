<?php

$arr = [];
$input_num = [];
$input_num = explode(' ', readline());

for ($i=0;$i<count($input_num); $i++){
    $arr[$i] = $input_num[$i];
}

$flag = false;

for ($i=0; $i<count($arr); $i++){
    for ($j=$i+1;$j<count($arr); $j++){
        for ($k = 0; $k<count($arr); $k++){
            if ($arr[$i] + $arr[$j] == $arr[$k]){
                echo $arr[$i]." + ".$arr[$j]." == ".$arr[$k].PHP_EOL;
                $flag = true;
                break;
            }
        }
    }
}

if (!$flag){
   echo "No";
}