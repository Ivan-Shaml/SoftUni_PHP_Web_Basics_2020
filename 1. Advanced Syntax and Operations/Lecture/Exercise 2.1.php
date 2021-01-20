<?php
//Generate matrix and output value of coordinate

$matrix = [];
$rows = intval(readline());

for ($i = 0 ; $i < $rows; $i++){
    $matrix[] = explode(" ", readline());
}
list($row, $col) = explode(" ", readline());
echo $matrix[$row][$col];


/*
3
1 2 3
4 5 6
7 8 9
1 2
*/
//Answer: 6