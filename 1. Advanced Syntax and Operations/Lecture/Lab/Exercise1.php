<?php
$months = ["January","February","March", "April", "May" ,"June", "July", "August", "September", "October", "November", "December"];
$choice = intval(readline());

if ($choice >= 1 && $choice <= 12){
    echo $months[$choice-1];
}
else{
    echo "Invalid Month!";
}