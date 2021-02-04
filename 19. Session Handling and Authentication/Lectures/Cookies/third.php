<?php
if(isset($_COOKIE['background-color'])) {
    $background = $_COOKIE['background-color'];
    echo "<body bgcolor='$background'>";
}
echo "<h1>Third Page</h1>";