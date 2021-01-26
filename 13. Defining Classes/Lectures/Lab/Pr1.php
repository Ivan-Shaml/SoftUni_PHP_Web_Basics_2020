<?php

function isPalindrome(string $s1){
    for ($i=0;$i<strlen($s1)/2;$i++)
        if ($s1[$i] != $s1[strlen($s1) - $i - 1])
            return false;
    return true;
}

$str = readline();
if (isPalindrome($str)) {
    echo "true";
}
else echo "false";