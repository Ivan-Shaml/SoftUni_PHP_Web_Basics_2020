<?php
include 'db/db_connection.php';
include_once 'templates/register_form.php';

//Example Program: Write to SQL Database "test_login" and print on DOM tree(HTML), using PHP PDO, and SQL Injection mitigation techniques, registering a user

if (isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "
        INSERT INTO
            users (
                username,
                password
            )
        VALUES (
                ?,
                ?
        )
    ";

    $pass_hash = password_hash($password, PASSWORD_ARGON2I);
    $statement = $db->prepare($query);
    $result = $statement->execute(
        [
            $username,
            $pass_hash
        ]
    );
    if ($result){
        header("Location: login.php");
        exit;
    }else{
        echo "Error!";
    }
}
?>