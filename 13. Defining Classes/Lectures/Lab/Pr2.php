<?php

function DoF(string $day){
    $week = [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
    ];
    for ($i=0;$i<count($week);$i++) {
        if ($week[$i] === $day) {
            return $i + 1;
        }
    }
        return "Invalid day!";
}

echo DoF(readline());