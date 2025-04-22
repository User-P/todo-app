$(function () {
    $('#task-form').on('submit', function (e) {
        e.preventDefault();
        const taskName = $('#task_name').val();
        if (!taskName.trim()) return;

        $.post('add.php', { task_name: taskName }, function () {
            location.reload();
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        const taskId = $(this).data('id');

        Swal.fire({
            title: '¿Eliminar tarea?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('delete.php', { id: taskId }, function () {
                    location.reload();
                });
            }
        });
    });

    // Eliminar tareas seleccionadas
    $('#delete-selected').on('click', function () {
        const selectedIds = $('input.task-checkbox:checked')
            .map(function () { return $(this).val(); })
            .get();

        if (selectedIds.length === 0) {
            Swal.fire('Sin selección', 'Selecciona al menos una tarea.', 'info');
            return;
        }

        Swal.fire({
            title: '¿Eliminar tareas seleccionadas?',
            text: "Esta acción eliminará múltiples tareas.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sí, eliminar todas'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('bulk_delete.php', { ids: selectedIds }, function () {
                    location.reload();
                });
            }
        });
    });

    $('#delete-all').on('click', function () {
        Swal.fire({
            title: '¿Eliminar todas las tareas?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sí, eliminar todo'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('delete_all.php', function () {
                    location.reload();
                });
            }
        });
    }
    );
});
