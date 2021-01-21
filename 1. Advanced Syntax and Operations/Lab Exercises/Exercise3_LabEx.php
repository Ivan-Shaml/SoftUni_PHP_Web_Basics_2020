<?php

//Method 1:

$input = explode(" ", readline());
$sum = 0;

for ($i = 0; $i<count($input);$i ++){
    $sum += intval(strrev($input[$i]));
}

echo $sum;

/*//Method 2:
echo array_reduce(
    explode(" ", readline()),
   function ($sum, $el){
        return $sum += intval(strrev($el));
    },
    0
);*/