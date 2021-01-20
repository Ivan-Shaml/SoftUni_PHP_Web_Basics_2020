<?php
//Sums the diagonals of the Matrix
$matrix = [];
$rows = intval(readline());

for ($i = 0 ; $i < $rows; $i++){
    $matrix[] = explode(" ", readline());
}

$rightDiagonal = 0;
$leftDiagonal = 0;
$col = count($matrix) - 1;
for ($i = 0; $i < count($matrix); $i++){
    $rightDiagonal += $matrix[$i][$i];
    $leftDiagonal += $matrix[$i][$col];
    $col --;
}

echo $rightDiagonal;
echo PHP_EOL;
echo $leftDiagonal;

/*
4
7 11 9 8
6 4 9 3
12 10 3 2
12 10 3 2

Answer: 16 39
*/