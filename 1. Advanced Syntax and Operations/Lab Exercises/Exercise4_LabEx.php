<?php

$numbers = explode(" ", readline());
$maxCount = 0;
$number = 0;

for ($row = 0; $row < count($numbers); $row++){
    $currentCount = 0;
    for ($col = $row ; $col < count($numbers); $col++){
        if ($numbers[$row] == $numbers[$col]){
            $currentCount++;
            if ($currentCount > $maxCount){
                $maxCount = $currentCount;
                $number = $numbers[$row];
            }
        }
    }
}

echo $number;