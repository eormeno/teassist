document.addEventListener('DOMContentLoaded', function () {
    // Botones para abrir el modal
    const openButtons = document.querySelectorAll('.openModalButton');
    const modals = document.querySelectorAll('.confirmationModal');

    // Abrir el modal
    openButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = button.getAttribute('data-object-id');
            const modal = document.querySelector(`.confirmationModal[data-object-id="${userId}"]`);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    // Cerrar el modal (cancelar)
    const cancelButtons = document.querySelectorAll('.cancelButton');
    cancelButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modal = button.closest('.confirmationModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    // Confirmar la eliminación
    const confirmButtons = document.querySelectorAll('.confirmButton');
    confirmButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            const userId = button.getAttribute('data-object-id');
            const form = button.closest('form');
            form.submit();  // Envía el formulario para eliminar el usuario
        });
    });
});
