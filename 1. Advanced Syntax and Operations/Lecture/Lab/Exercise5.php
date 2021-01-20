<?php
$arr1 = [];
$arr2 = [];

$arr1 = explode(" ",readline());
$arr2 = explode(" ",readline());
$index = 0;

if (count($arr1) != count($arr2)){
    if (count($arr1) > count($arr2)){
        $iter = count($arr2) + (count($arr1) - count($arr2));
        for ($i = count($arr2); $i < $iter; $i++){
            array_push($arr2, $arr2[$index]);
            $index++;
            if ($index > count($arr2)){
                $index = 0;
            }
        }
    }elseif (count($arr1) < count($arr2)) {
        $iter = count($arr1) + (count($arr2) - count($arr1));
        for ($i = count($arr1); $i < $iter; $i++) {
            array_push($arr1, $arr1[$index]);
            $index++;
            if ($index > count($arr1)){
                $index = 0;
            }
        }
    }
}

for ($i = 0; $i < count($arr1); $i++){
    echo $arr1[$i] + $arr2[$i]." ";
}