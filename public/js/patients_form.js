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

//Función para validar entradas de checkbox.
function messageAlert() {
    var h2 = document.createElement("h2");
    var texto = document.createTextNode("Este es un nuevo h2 insertado con JavaScript");
    
    // Agrega el nodo de texto al elemento h2
    nuevoH2.appendChild(texto);
    
    // Obtén el elemento específico por su ID y agrega el h2 a él
    var elementoEspecifico = document.getElementById("miElementoEspecifico");
    elementoEspecifico.appendChild(nuevoH2);
}

// Asigna la función al botón
document.getElementById("insertarH2").addEventListener("click", insertarH2EnElementoEspecifico);