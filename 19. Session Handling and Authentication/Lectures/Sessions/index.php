<?php
session_start();
$users = [
    'pesho' => 123,
    'gosho' => 321
];
?>
<form method="post">
    Username: <input type="text" name="username"/><br>
    Password: <input type="text" name="password"/>
    <br>
    <input type="submit">
</form>
<?php
if (isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($users[$username]) && $users[$username] == $password){
        $_SESSION['logged_in_user'] = $username;
        header("Location: another.php");
        exit;
    }
}