<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("UPDATE tasks SET task_name = ? WHERE id = ?");
  $stmt->execute([$_POST['task_name'], $_POST['id']]);
  header('Location: index.php');
  exit;
}

$id = $_GET['id'] ?? null;

if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("ID inválido");
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch();

if (!$task) {
  die("Tarea no encontrada");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar tarea</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <header>
      <h1>Editar tarea</h1>
    </header>

    <form id="task-form" method="post">
      <input type="hidden" name="id" value="<?= $task['id'] ?>">
      <input type="text" name="task_name" id="task_name" value="<?= htmlspecialchars($task['task_name']) ?>" required>
      <button class="btn success" type="submit">Actualizar</button>
    </form>

    <a class="btn" href="index.php">Volver</a>
  </div>
</body>

</html>
