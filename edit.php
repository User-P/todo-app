<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("UPDATE tasks SET task_name = ? WHERE id = ?");
  $stmt->execute([$_POST['task_name'], $_POST['id']]);
  header('Location: index.php');
  exit;
}

$id = $_GET['id'] ?? null;
if (!$id) die("ID inválido");

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch();
?>

<form method="post">
  <input type="hidden" name="id" value="<?= $task['id'] ?>">
  <input type="text" name="task_name" value="<?= htmlspecialchars($task['task_name']) ?>">
  <button type="submit">Actualizar</button>
</form>
