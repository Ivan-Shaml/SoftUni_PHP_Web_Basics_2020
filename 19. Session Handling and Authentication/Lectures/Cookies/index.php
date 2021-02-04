<form method="post">
    Choose Background Color: <input type="color" name="color" />
    <input type="submit">
</form>

<?php
if (isset($_POST['color'])){
    $color = $_POST['color'];
    setcookie("background-color", $color, time()+30);//set cookie to expire after 30 seconds, if it doesnt have a limit specified it is like a session cookie
    header("Location: another.php");
}
?>