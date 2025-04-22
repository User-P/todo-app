<?php
require 'db.php';

if (!empty($_POST['ids']) && is_array($_POST['ids'])) {
  $in  = str_repeat('?,', count($_POST['ids']) - 1) . '?';
  $stmt = $pdo->prepare("DELETE FROM tasks WHERE id IN ($in)");
  $stmt->execute($_POST['ids']);
}
