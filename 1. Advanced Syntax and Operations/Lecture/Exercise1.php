<?php

// Associative arrays - make an array with the count of occurrences of a char in a string (from std in)

$str = readline();
$occurrences = [];
for ($i =0; $i < strlen($str); $i++){
    $char = $str[$i];
    if (!key_exists($char, $occurrences)){
        $occurrences[$char] = 0;
    }
    $occurrences[$char]++;
}

foreach ($occurrences as $char => $count){
    echo $char . ": " . $count . PHP_EOL;
}