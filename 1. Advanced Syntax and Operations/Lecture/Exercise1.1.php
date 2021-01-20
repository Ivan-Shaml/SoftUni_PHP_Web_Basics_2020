<?php

// Associative arrays - make an array with the count of occurrences of a char in a string (from std in)
// Associative arrays SORTS

$str = readline();
$occurrences = [];
for ($i =0; $i < strlen($str); $i++){
    $char = $str[$i];
    if (!key_exists($char, $occurrences)){
        $occurrences[$char] = 0;
    }
    $occurrences[$char]++;
}

/*
 * sort - doesn't preserve the keys
 * rsort - same as sort but on reverse value(DESC)
 * ksort - sorts on keys
 * krsort - sorts keys on reverse(DESC)
 *
 * asort - sorts and preserves the keys
 * arsort - sorts and preserves the keys on reverse(DESC)
 *
 * usort - takes user defined sorting function, doesnt preserve keys
 * uasort - takes user defined sorting function(comparer), preserves the keys
 * uksort - takes user defined sorting function(comparer), sorts on keys, doesnt access the associated values
 * use function($key1, $key2) use($array1){//} to access the value associated with the key
 * */

uksort($occurrences, function ($k1, $k2) use($occurrences){ //sorts on keys, if they value is same, DESC the sort for the items same value items
    $e1 = $occurrences[$k1];
    $e2 = $occurrences[$k2];

    $cmp = $e2 <=> $e1;
    if ($cmp != 0){
        return $cmp;
    }
    return $k2 <=> $k1;
});

foreach ($occurrences as $char => $count){
    echo $char . ": " . $count . PHP_EOL;
}