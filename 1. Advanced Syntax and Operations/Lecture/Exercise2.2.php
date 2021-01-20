<?php
//Find Max Value of Matrix

$matrix = [];
$rows = intval(readline());

for ($i = 0 ; $i < $rows; $i++){
    $matrix[] = explode(" ", readline());
}

$max = PHP_INT_MIN;
for ($row = 0; $row < count($matrix); $row++){
    for ($col = 0; $col < count($matrix[$row]); $col++){
        $value = $matrix[$row][$col];
        if ($value > $max){
            $max = $value;
        }
    }
}
echo $max;
