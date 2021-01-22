<?php

$numbers = explode(" ",readline());
$count = intval(readline());

$result = array_fill(0,count($numbers),0);

for ($i=0; $i<$count; $i++){

    $lastElement = array_pop($numbers);
    array_unshift($numbers, $lastElement);

    for ($j = 0; $j < count($numbers); $j++){
        $result[$j] += $numbers[$j];
    }
}

foreach ($result as $item){
    echo $item . " ";
}