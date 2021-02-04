<?php
session_start();
unset($_SESSION['logged_in_user']);
session_destroy();
header("Location: index.php");
