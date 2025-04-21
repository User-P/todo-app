<?php
require 'db.php';

if (!empty($_POST['id'])) {
  $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
  $stmt->execute([$_POST['id']]);
  echo "deleted";
} else {
  http_response_code(400);
}
