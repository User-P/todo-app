<?php
require 'db.php';

if (!empty($_POST['task_name'])) {
    $stmt = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (?)");
    $stmt->execute([$_POST['task_name']]);
    echo "ok";
} else {
    http_response_code(400);
}
