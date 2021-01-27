<?php

class DateModifier
{
    public function calculateDayDifference(string $dateFrom, string $dateTo):void
    {
        $dateFromParts = array_map("intval", explode(" ", $dateFrom));
        $dateToParts = array_map("intval", explode(" ", $dateTo));

        $dateFrom = new DateTime($dateFromParts[0].'-'.$dateFromParts[1].'-'.$dateFromParts[2]);
        $dateTo = new DateTime($dateToParts[0].'-'.$dateToParts[1].'-'.$dateToParts[2]);

        $interval = $dateFrom->diff($dateTo);
        echo $interval->format('%a');
    }
}

$dt = new DateModifier();

$dTo = readline();
$dFrom = readline();

$dt->calculateDayDifference($dTo, $dFrom);