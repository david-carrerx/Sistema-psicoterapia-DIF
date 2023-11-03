//Función para manipular el seleccionado de los objetos de la barra.
document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            // Elimina la clase 'selected' de todos los elementos de navegación
            navLinks.forEach(function (navLink) {
                navLink.classList.remove('selected');
            });

            // Agrega la clase 'selected' al elemento de navegación seleccionado
            this.classList.add('selected');
        });
    });
});

//Función para redirección de usuario en etiquetas <li>
document.querySelectorAll('.nav-item').forEach(function (li) {
    li.addEventListener('click', function () {
        var href = li.getAttribute('data-href');
        if (href) {
            window.location.href = href;
        }
    });
});

// Función para manejar el clic en "Cerrar sesión"
function logoutOnClick(event) {
    event.preventDefault(); // Previene la acción predeterminada del enlace

    // Encuentra el elemento <form> dentro del <li>
    var form = document.querySelector('#logout-item form');

    if (form) {
        form.submit(); // Envía el formulario de cierre de sesión
    }
}