<?php
//Multidimensional arrays / Matrices

$a1 = [1,2,3,4,5];
$a2 = [6,7,8,9,10];
$a3 = [11,12,13,14,15];
$a4 = [16,17,18,19,20];

$mx = [$a1,$a2,$a3,$a4];

//echo $mx[3][2]; //18

foreach ($mx as $arr){
    foreach ($arr as $value){
        echo $value . ' ';
    }
    echo PHP_EOL;
}

