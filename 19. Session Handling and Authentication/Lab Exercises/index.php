<?php

use Database\PDODatabase;
use \App\Data\UserDTO;
spl_autoload_register();

$pdo = new PDO("mysql:host=localhost:3306;dbname=php_web_test", "root","toor");
$db = new PDODatabase($pdo);

/**
$db = new PDODatabase($pdo);
$stmt = $db->query("SELECT * FROM users");
$rs = $stmt->execute();
$allUsers = $rs->fetch(UserDTO::class);
 **/

$allUsers = $db
        ->query("SELECT * FROM users")
        ->execute()
        ->fetch(UserDTO::class);

/** @var UserDTO $user */
foreach ($allUsers as $user){
    echo $user->getUsername() . "<br />";
}