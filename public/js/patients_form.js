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