<?php
/*Iterate the matrix, check if the element of the row has a previous one, and if it has,
on the current iterator position, sum with the previous one*/

$matrix = [];
$rows = intval(readline());

for ($i = 0 ; $i < $rows; $i++){
    $matrix[] = explode(" ", readline());
}

for ($row = 0; $row < count($matrix); $row++){
    for ($col = 0; $col < count($matrix[$row]); $col++){
        if (isset($matrix[$row][$col-1])){
            $matrix[$row][$col] += $matrix[$row][$col-1];
        }

        if (isset($matrix[$row][$col-2])){
            $matrix[$row][$col] += $matrix[$row][$col-2];
        }
        echo $matrix[$row][$col] . ' ';
    }
    echo PHP_EOL;
}

/*
 3
7 11 9 8
6 4 9 3
12 10 3 2
//Answer:
7 18 34 60
6 10 25 38
12 22 37 61 */