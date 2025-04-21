$(function () {
    $('#task-form').on('submit', function (e) {
        e.preventDefault();
        const taskName = $('#task_name').val();
        $.post('add.php', { task_name: taskName }, function () {
            location.reload();
        });
    });

    $('.delete-task').on('click', function () {
        if (confirm("¿Estás seguro de eliminar esta tarea?")) {
            const taskId = $(this).data('id');
            $.post('delete.php', { id: taskId }, function () {
                location.reload();
            });
        }
    });
});
