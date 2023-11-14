//Función para modificar el documento.
$(document).ready(function() {
    
    //Función para actualizar el campo de entrada de precio con el precio del servicio seleccionado.
    $("#service").change(function() {
        var selectedOption = $(this).find("option:selected");
        var selectedServicePrice = selectedOption.data("price");

        $("#price").val(selectedServicePrice);
    });

    //Función para agregar una fila a la tabla cuando se haga clic en el botón "Agregar".
    $("#addPayment").click(function() {
        var service = $("#service option:selected").text();
        var price = $("#price").val();
        var patientSelect = $("#patient-name");

        if (service && price && patientSelect.val()) {
            $("#paymentTable tbody").append('<tr><td></td><td>' + service + '</td><td>' + price + '</td><td><a href="#" class="remove-row btn btn-danger">Eliminar</a></td></tr>');

            $("#service").val("");
            $("#price").val("");
            patientSelect.addClass("selected").attr("disabled", "disabled");

            $("#service").prop("disabled", true);

            updateTotalAmount();
        }
    });

    //Función para eliminar una fila cuando se haga clic en el enlace "Eliminar".
    $(document).on("click", ".remove-row", function(e) {
        e.preventDefault();
        $(this).closest("tr").remove();

        $("#service").prop("disabled", false);

        updateTotalAmount();
    });

    // Función para calcular y actualizar la suma de la columna "Importe" y el valor del input.
    function updateTotalAmount() {
        var totalAmount = 0;
        $("#paymentTable tbody tr").each(function() {
            var price = parseFloat($(this).find("td:nth-child(3)").text());
            if (!isNaN(price)) {
                totalAmount += price;
            }
        });

        $("#paymentTable tfoot td[name='total-amount']").text(totalAmount.toFixed(2));
        $("#total-amount-input").val(totalAmount.toFixed(2));
    }
});

//Función para asignar los valores de select a los input.
document.addEventListener("DOMContentLoaded", function () {
    const selectBox = document.getElementById("patient-name");
    const inputBox = document.getElementById("patient-selected");

    selectBox.addEventListener("change", function () {
        const selectedValue = selectBox.value;
        inputBox.value = selectedValue;
    });
});

//Función para asignar el valor del precio a un campo especial.
$(document).ready(function() {
    $("#total-amount").on("change", function() {
        var totalAmount = $(this).text();
        
        $("#total-amount-input").val(totalAmount);
    });
});

//Función para asignar valor a servicio.
$(document).ready(function() {
    $("#service").change(function() {
        var selectedOption = $(this).find("option:selected");
        var selectedServiceId = selectedOption.val();
        $("#service-id-input").val(selectedServiceId);
    });
});

//Función para signar valor a paciente.
$(document).ready(function() {
    $("#select-patient").change(function() {
        var selectedPatient = $(this).val();
        $("input[name='selected-patient']").val(selectedPatient);
    });
});

