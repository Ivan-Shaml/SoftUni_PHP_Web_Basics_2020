<?php

//Example Program: Read from SQL Database "geography" and print on DOM tree(HTML), using MySQLi

$db = new mysqli("localhost", "root","toor", "geography");
$result = $db->query("SELECT * FROM countries");
$countries = $result->fetch_all(MYSQLI_ASSOC);

echo "<table border=1>
    <thead>
    <tr>
        <th>Country Code</th>
        <th>Country Name</th>
        <th>Capital City</th>
    </tr>
    </thead>
    <tbody>
    ";

foreach ($countries as $country){
    echo "<tr>
        <td>{$country['country_code']}</td>
        <td>{$country['country_name']}</td>
        <td>{$country['capital']}</td>
        </tr>
    ";
}

echo "</tbody></table>";