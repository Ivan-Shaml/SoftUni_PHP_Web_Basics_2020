<?php

//Example Program: Read from SQL Database "geography" and print on DOM tree(HTML), using PHP PDO

$db = new PDO("mysql:dbname=geography;host=localhost:3306","root","toor");
$result = $db->query("SELECT * FROM countries");
$countries = $result->fetchAll(PDO::FETCH_ASSOC);

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