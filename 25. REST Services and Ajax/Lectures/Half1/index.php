<?php
header("Content-Type: application/json");
$uri = str_replace('SoftUni_PHP_Web_Basics/25.%20REST%20Services%20and%20Ajax/Lectures/Half1/', '', $_SERVER['REQUEST_URI']);
$db = new PDO("mysql:dbname=php_web_test;host=localhost", "root","toor");

if (preg_match("/^\/users$/", $uri)){
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        echo json_encode($db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $requestPayload = file_get_contents('php://input', 'r');
        $user = json_decode($requestPayload, true);
        $stmt = $db->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
        $res = $stmt->execute([$user['username'], $user['password']]);
        if ($res){
            http_response_code(201);
            echo json_encode(array_merge(['id' => $db->lastInsertId()], $user));
            exit;
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'Something went wrong!']);
            exit;
        }
    }

} else if (preg_match("/^\/users\/(\\d+)$/", $uri, $matches)) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$matches[1]]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] === 'PATCH'){
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$matches[1]]);
        if (empty($stmt->fetch(PDO::FETCH_ASSOC))){
            http_response_code(404);
            exit;
        }

        $requestPayload = file_get_contents('php://input', 'r');
        $user = json_decode($requestPayload, true);
        $id = $matches[1];

        $query = "UPDATE users SET ";
        foreach (array_keys($user) as $column){
            $query .= $column . ' = ?, ';
        }

        $query = rtrim($query, ', ');
        $query .= ' WHERE id = ?';
        $stmt = $db->prepare($query);
        $res = $stmt->execute(array_merge(array_values($user), [$id]));
        if ($res){
            http_response_code(200);
            echo json_encode(array_merge(['id' => $db->lastInsertId()], $user));
            exit;
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'Something went wrong!']);
            exit;
        }
    }else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $id = $matches[1];
        $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        http_response_code(200);
        exit;
    }
}else {
    echo "else";
}