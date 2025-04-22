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
    <div class="container">
        <h1>Lista de Tareas</h1>

        <form id="task-form">
            <input
                type="text"
                name="task_name"
                id="task_name"
                placeholder="Nueva tarea" 
                required
                autofocus
                >
            <button class="btn success" type="submit">Añadir</button>
        </form>

        <section class="task-list">
            <?php
            if (empty($tasks)) { ?>
                <p>No hay tareas disponibles.</p>
            <?php
            } ?>
            <?php
            foreach ($tasks as $task): ?>
                <div class="task-item">
                    <p class="task"><?= htmlspecialchars($task['task_name']) ?></p>
                    <li class="task-actions">
                        <a class="btn" href="edit.php?id=<?= $task['id'] ?>">Editar</a>
                        <a href="#" class="btn delete" data-id="<?= $task['id'] ?>">Eliminar</a>
                    </li>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
