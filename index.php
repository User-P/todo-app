<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Lista de Tareas</h1>

    <form id="task-form">
        <input type="text" name="task_name" id="task_name" placeholder="Nueva tarea" required>
        <button type="submit">Añadir</button>
    </form>

    <ul id="task-list">
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['task_name']) ?>
                [<a href="edit.php?id=<?= $task['id'] ?>">Editar</a>]
                [<a href="#" class="delete-task" data-id="<?= $task['id'] ?>">Eliminar</a>]
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
