//Función para enlazar y obtener la información de los checkbox.
document.addEventListener("DOMContentLoaded", function () {
    const checkbox1 = document.getElementById("checkbox1");
    const checkbox2 = document.getElementById("checkbox2");

    checkbox1.addEventListener("change", function () {
        if (checkbox1.checked) {
            checkbox2.checked = false;
        }
    });

    checkbox2.addEventListener("change", function () {
        if (checkbox2.checked) {
            checkbox1.checked = false;
        }
    });
});

//Función para la habilitación de los botones.
document.getElementById('edit').addEventListener('click', function () {
    // Ocultar el mensaje de éxito al hacer clic en "Editar"
    var successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.style.display = 'none';
    }

    // Habilitar la edición
    const camposEditablesTexto = document.querySelectorAll('input[type="text"]');
    const camposEditablesFecha = document.querySelectorAll('input[type="date"]');
    const generoEditable = document.getElementById('gender');
    const estadoCivilEditable = document.getElementById('civil_status');
    const escolaridadEditable = document.getElementById('scholarship');

    generoEditable.removeAttribute('disabled');
    estadoCivilEditable.removeAttribute('disabled');
    escolaridadEditable.removeAttribute('disabled');

    for (const campo of camposEditablesTexto) {
        campo.removeAttribute('disabled');
    }

    for (const campo of camposEditablesFecha) {
        campo.removeAttribute('disabled');
    }

    // Mostrar los botones "Guardar" y "Cancelar" y ocultar el botón "Editar"
    document.getElementById('save').style.display = 'inline';
    document.getElementById('cancel').style.display = 'inline';
    document.getElementById('edit').style.display = 'none';
});

//Función para deshabilitar el boton de cancelar.
document.getElementById('cancel').addEventListener('click', function () {
    // Deshabilitar la edición y volver al estado original
    const generoEditable = document.getElementById('gender');
    const estadoCivilEditable = document.getElementById('civil_status');
    const escolaridadEditable = document.getElementById('scholarship');
    const camposEditablesTexto = document.querySelectorAll('input[type="text"]');
    const camposEditablesFecha = document.querySelectorAll('input[type="date"]');

    generoEditable.setAttribute('disabled', 'disabled');
    estadoCivilEditable.setAttribute('disabled', 'disabled');

    for (const campo of camposEditablesTexto) {
        campo.setAttribute('disabled', 'disabled');
    }

    for (const campo of camposEditablesFecha) {
        campo.setAttribute('disabled', 'disabled');
    }

    // Ocultar los botones "Guardar" y "Cancelar" y mostrar el botón "Editar"
    document.getElementById('save').style.display = 'none';
    document.getElementById('cancel').style.display = 'none';
    document.getElementById('edit').style.display = 'inline';
});

//Función para enviar el formulario.
document.getElementById('save').addEventListener('click', function () {
    document.getElementById('patient-form').submit();
});