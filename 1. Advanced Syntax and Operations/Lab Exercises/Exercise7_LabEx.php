<?php

$n = intval(readline());
$k = intval(readline());

$numbers = array_fill(0,$n,0);
$numbers[0] = 1;

for ($currentElement = 0; $currentElement < count($numbers); $currentElement++){
    $startIndex = max(0,$currentElement - $k);

    $sum = 0;
    for ($i=$startIndex;$i < $currentElement; $i++){
        $sum += $numbers[$i];
    }

    $numbers[$currentElement] += $sum;
}

echo implode(" ", $numbers);