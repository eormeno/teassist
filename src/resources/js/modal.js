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
document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.getElementById('options');
    const therapistDiv = document.getElementById('therapist-select');

    function toggleTherapistField() {
        const selectedRoles = Array.from(roleSelect.selectedOptions).map(option => option.value);
        if (selectedRoles.includes('patient')) {
            therapistDiv.style.display = 'block';
        } else {
            therapistDiv.style.display = 'none';
            // Opcional: limpiar selección si se oculta
            therapistDiv.querySelector('select').selectedIndex = 0;
        }
    }

    // Ejecutar al cargar la página
    toggleTherapistField();

    // Ejecutar cada vez que se cambie la selección
    roleSelect.addEventListener('change', toggleTherapistField);
});
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.querySelector('select[name="therapist_ids[]"]');

        select.addEventListener('change', function () {
            const selectedValues = Array.from(select.selectedOptions).map(option => option.value);

            // Si "No definido" (value === "") está seleccionado, deseleccionamos los demás
            if (selectedValues.includes("")) {
                Array.from(select.options).forEach(option => {
                    if (option.value !== "") {
                        option.selected = false;
                    }
                });
            } else {
                // Si se selecciona cualquier otra opción, deseleccionar "No definido"
                Array.from(select.options).forEach(option => {
                    if (option.value === "") {
                        option.selected = false;
                    }
                });
            }
        });
    });


