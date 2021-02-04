<?php
session_start();
session_regenerate_id(true);//regenerates the session on every request, so the old value is invalidated
if(!isset($_SESSION['logged_in_user'])) {
    echo "<h1>Vzemi se logni we :@@@</h1>";
}else{
    echo "<h1>Welcome," . $_SESSION['logged_in_user'] . "</h1>";
    echo "<a href='third.php'> Third page</a>";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}