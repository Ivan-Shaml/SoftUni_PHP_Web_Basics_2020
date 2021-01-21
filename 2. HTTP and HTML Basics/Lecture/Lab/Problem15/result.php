<?php
if (isset($_GET['names'], $_GET['ages'], $_GET['delimiter'])){
 $names = $_GET['names'];
 $ages = $_GET['ages'];
 $delimiter = $_GET['delimiter'];
 $names = explode($delimiter, $names);
 $ages = explode($delimiter, $ages);
}

include 'result_frontend.php';
