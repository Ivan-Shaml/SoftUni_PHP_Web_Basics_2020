<form method="get">
    <label for="name">Name: </label><input type="text" name="name"/><br>
    <label for="phone">Phone number: </label><input type="text" name="phone"/><br>
    <label for="age">Age: </label><input type="text" name="age"/><br>
    <label for="address">Address: </label><input type="text" name="address"/><br>

    <input type="submit"/>
</form>


<?php
if (isset($_GET['name'],$_GET['phone'],$_GET['age'],$_GET['address'])){
    $name = $_GET['name'];
    $age = $_GET['age'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];

    echo "<table border='2'>";
    echo "<tr><td style='background-color:orange'>Name</td><td>$name</td></tr>";
    echo "<tr><td style='background-color:orange'>Age</td><td>$age</td></tr>";
    echo "<tr><td style='background-color:orange'>Phone number</td><td>$phone</td></tr>";
    echo "<tr><td style='background-color:orange'>Address</td><td>$address</td></tr>";
    echo "</table>";
}