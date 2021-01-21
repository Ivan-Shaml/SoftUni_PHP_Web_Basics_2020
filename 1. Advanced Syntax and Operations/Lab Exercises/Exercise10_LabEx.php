<?php

$matrixSize = array_map("intval",
            explode(", ",
                readline())
);

$rowSize = $matrixSize[0];
$colSize = $matrixSize[1];
$matrix = [];

for ($row = 0; $row < $rowSize; $row++){
    $matrix[$row] =
        array_map("intval",
            explode(", ",
            readline())
        );
}

$sum = 0;
for ($row=0; $row < count($matrix); $row++){
    for ($col = 0; $col < count($matrix[$row]); $col++){
       $sum += $matrix[$row][$col];
    }
}
echo $rowSize . PHP_EOL;
echo $colSize . PHP_EOL;
echo $sum;