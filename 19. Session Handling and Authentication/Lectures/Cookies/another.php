<?php
if(isset($_COOKIE['background-color'])) {
    $background = $_COOKIE['background-color'];
    echo "<body bgcolor='$background'>";
}
echo "<h1>Hello</h1>";
echo "<a href='third.php'> Third page</a>";