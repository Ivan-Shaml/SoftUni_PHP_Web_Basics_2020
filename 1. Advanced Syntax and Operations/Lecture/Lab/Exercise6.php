<?php

$matrix = [];
$n=[];
$n = explode(", ",trim(readline(), ' '));

if ($n[1] == 'A'){
    PrintMatrix(pat1($n[0]), $n[0]);
}
elseif ($n[1] == 'B') {
    PrintMatrix(pat2($n[0]), $n[0]);
}
else{
    echo "Wrong Choice!";
}

function pat1($n){
    $matrix1 = [];
    $cn = 1;

    for ($row = 0; $row < $n; $row++) {
            for ($col=0; $col<$n; $col++) {
                $matrix1[$col][$row] = $cn;
                $cn++;
            }
        }
    return $matrix1;
}

function pat2($n){
    $matrix1 = [];
    $cn = 1;

    for ($col = 0; $col < $n; $col++) {
        if ($col % 2 == 0) {
            for ($row = 0; $row < $n; $row++) {
                $matrix1[$row][$col] = $cn;
                $cn++;
            }
        }else{
            for ($row = $n-1; $row>=0; $row--) {
                $matrix1[$row][$col] = $cn;
                $cn++;
            }
        }
    }
    return $matrix1;
}



function PrintMatrix($m, $n){
    for ($row = 0; $row < $n; $row++) {
        for ($col=0; $col<$n; $col++) {
            echo $m[$row][$col] . ' ';
        }
        echo PHP_EOL;
    }
}
