<?php
$input  = explode(" ", readline());

//Method 1:

//for ($i = count($input) -1; $i >=0; $i--){
//    echo $input[$i] . " ";
//}

// Method 2:

//for($i = 0; $i < count($input); $i++) {
//    echo $input[count($input) - $i - 1];
//}

// Method 3:

echo implode(" ",array_reverse($input));