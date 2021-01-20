<?php

$n = intval(readline());
$arr = [];
for ($i=0;$i<$n;$i++){
    $input = intval(readline());
    $arr[$i] = $input;
}

for ($i=$n-1; $i>=0; $i--){
    echo $arr[$i]. ' ';
}