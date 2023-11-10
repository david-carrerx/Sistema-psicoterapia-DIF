// Función para la habilitación de los botones.
document.getElementById('edit').addEventListener('click', function () {

    var successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.style.display = 'none';
    }

    const camposEditablesTexto = document.querySelectorAll('input[type="text"]');
    const camposEditablesFecha = document.querySelectorAll('input[type="date"]');
    const emailEditable = document.querySelector('input[name="email"]');
    const celularEditable = document.querySelector('input[name="phone"]');
    const rolEditable = document.getElementById('role');

    emailEditable.removeAttribute('disabled');
    celularEditable.removeAttribute('disabled');
    rolEditable.removeAttribute('disabled');

    for (const campo of camposEditablesTexto) {
        campo.removeAttribute('disabled');
    }

    for (const campo of camposEditablesFecha) {
        campo.removeAttribute('disabled');
    }

    document.getElementById('save').style.display = 'inline';
    document.getElementById('cancel').style.display = 'inline';
    document.getElementById('edit').style.display = 'none';
});

// Función para deshabilitar el botón de cancelar.
document.getElementById('cancel').addEventListener('click', function () {
    const emailEditable = document.querySelector('input[name="email"]');
    const celularEditable = document.querySelector('input[name="phone"]');
    const rolEditable = document.getElementById('role');
    const camposEditablesTexto = document.querySelectorAll('input[type="text"]');
    const camposEditablesFecha = document.querySelectorAll('input[type="date"]');

    emailEditable.setAttribute('disabled', 'disabled');
    celularEditable.setAttribute('disabled', 'disabled');
    rolEditable.setAttribute('disabled', 'disabled');

    for (const campo of camposEditablesTexto) {
        campo.setAttribute('disabled', 'disabled');
    }

    for (const campo of camposEditablesFecha) {
        campo.setAttribute('disabled', 'disabled');
    }

    document.getElementById('save').style.display = 'none';
    document.getElementById('cancel').style.display = 'none';
    document.getElementById('edit').style.display = 'inline';
});

// Función para enviar el formulario.
document.getElementById('save').addEventListener('click', function () {
    document.getElementById('user-form').submit();
});