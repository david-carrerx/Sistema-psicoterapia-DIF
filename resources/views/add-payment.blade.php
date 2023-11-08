@extends('layouts.app')

@section('title', 'Pagos')
@section('content')
<h1>Datos del cobro</h1>
<div>
    <form action="{{ route('guardar-datos') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col order-last"></div>
        <div class="col">
            <label for="service">Servicio</label>
        </div>
        <div class="col psy">
            <label for="price">Importe</label>
        </div>
        <div class="col order-first">
            <label for="patient-name">Nombre</label>
        </div>
    </div>

    
    <div class="row">
        <div class="col order-last"></div>
        <div class="col">
            <select name="service" id="service">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <input id="service-id-input" name="service-id" type="hidden" placeholder="ID del servicio" readonly>
        </div>
        <div class="col psy">
            <input id="price" name="price" type="text" placeholder="Precio" autofocus readonly required>
            <input type="hidden" name="total-amount" id="total-amount-input" value="">
        </div>
        <div class="col order-first">
            <select name="patient-name" id="patient-name" required>
                <option value="">Selecciona un paciente</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
            </select>
            <input name="patient-name" type="hidden" id="patient-selected" readonly>
        </div>
        <button type="button" id="addPayment">Agregar</button>
    </div>
</div>

<table id="paymentTable">
    <thead>
        <tr>
            <th class="id">ID</th>
            <th>Servicio</th>
            <th>Importe</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td style="font-weight: bold">Importe total</td>
            <td id="total-amount">...</td>
            <td><button type="submit">Agregar pago</button></form></td>
        </tr>
    </tfoot>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    

<!--<script>
    $(document).ready(function() {
        $("#service").change(function() {
            var selectedOption = $(this).find("option:selected");
            var selectedServicePrice = selectedOption.data("price");

            // Actualiza el campo de entrada de precio con el precio del servicio seleccionado
            $("#price").val(selectedServicePrice);

            
        });

        // Agregar una fila a la tabla cuando se haga clic en el botón "Agregar"
        $("#addPayment").click(function() {
        var service = $("#service option:selected").text();
        var price = $("#price").val();
        var patientSelect = $("#patient-name");



        // Verifica si se ha seleccionado un servicio y un paciente antes de agregar la fila
        if (service && price && patientSelect.val()) {
            
            

            // Agregar una nueva fila a la tabla con los datos seleccionados
            $("#paymentTable tbody").append('<tr><td></td><td>' + service + '</td><td>' + price + '</td><td><a href="#" class="remove-row">Eliminar</a></td></tr>');

            // Limpiar los campos del formulario después de agregar la fila
            $("#service").val("");
            $("#price").val("");
            patientSelect.addClass("selected").attr("disabled", "disabled");

            // Calcular y actualizar la suma de la columna "Importe"
            updateTotalAmount();
            

        }
    });

        // Eliminar una fila cuando se haga clic en el enlace "Eliminar"
    $(document).on("click", ".remove-row", function(e) {
        e.preventDefault();
        $(this).closest("tr").remove();

        // Calcular y actualizar la suma de la columna "Importe" después de eliminar una fila
        updateTotalAmount();
    });

    

        // Función para calcular y actualizar la suma de la columna "Importe" y el valor del input
function updateTotalAmount() {
    var totalAmount = 0;
    $("#paymentTable tbody tr").each(function() {
        var price = parseFloat($(this).find("td:nth-child(3)").text());
        if (!isNaN(price)) {
            totalAmount += price;
        }
    });

    // Actualiza el valor en la celda correspondiente en la tabla
    $("#paymentTable tfoot td[name='total-amount']").text(totalAmount.toFixed(2));

    // Asigna el valor calculado al input
    $("#total-amount-input").val(totalAmount.toFixed(2));
}



    });

    document.addEventListener("DOMContentLoaded", function () {
    const selectBox = document.getElementById("patient-name");
    const inputBox = document.getElementById("patient-selected");
    

    selectBox.addEventListener("change", function () {
        // Obtén el valor seleccionado del select
        const selectedValue = selectBox.value;
        
        // Asigna el valor seleccionado al input
        inputBox.value = selectedValue;
    });
});

</script>-->


<!-- ... tu código anterior ... -->

<script>
    $(document).ready(function() {
        $("#service").change(function() {
            var selectedOption = $(this).find("option:selected");
            var selectedServicePrice = selectedOption.data("price");

            // Actualiza el campo de entrada de precio con el precio del servicio seleccionado
            $("#price").val(selectedServicePrice);
        });

        // Agregar una fila a la tabla cuando se haga clic en el botón "Agregar"
        $("#addPayment").click(function() {
            var service = $("#service option:selected").text();
            var price = $("#price").val();
            var patientSelect = $("#patient-name");

            // Verifica si se ha seleccionado un servicio y un paciente antes de agregar la fila
            if (service && price && patientSelect.val()) {
                // Agregar una nueva fila a la tabla con los datos seleccionados
                $("#paymentTable tbody").append('<tr><td></td><td>' + service + '</td><td>' + price + '</td><td><a href="#" class="remove-row">Eliminar</a></td></tr>');

                // Limpiar los campos del formulario después de agregar la fila
                $("#service").val("");
                $("#price").val("");
                patientSelect.addClass("selected").attr("disabled", "disabled");

                // Deshabilitar la selección de servicio después de agregar la fila
                $("#service").prop("disabled", true);

                // Calcular y actualizar la suma de la columna "Importe"
                updateTotalAmount();
            }
        });

        // Eliminar una fila cuando se haga clic en el enlace "Eliminar"
        $(document).on("click", ".remove-row", function(e) {
            e.preventDefault();
            $(this).closest("tr").remove();

            // Habilitar la selección de servicio después de eliminar una fila
            $("#service").prop("disabled", false);

            // Calcular y actualizar la suma de la columna "Importe" después de eliminar una fila
            updateTotalAmount();
        });

        // Función para calcular y actualizar la suma de la columna "Importe" y el valor del input
        function updateTotalAmount() {
            var totalAmount = 0;
            $("#paymentTable tbody tr").each(function() {
                var price = parseFloat($(this).find("td:nth-child(3)").text());
                if (!isNaN(price)) {
                    totalAmount += price;
                }
            });

            // Actualiza el valor en la celda correspondiente en la tabla
            $("#paymentTable tfoot td[name='total-amount']").text(totalAmount.toFixed(2));

            // Asigna el valor calculado al input
            $("#total-amount-input").val(totalAmount.toFixed(2));
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const selectBox = document.getElementById("patient-name");
        const inputBox = document.getElementById("patient-selected");

        selectBox.addEventListener("change", function () {
            // Obtén el valor seleccionado del select
            const selectedValue = selectBox.value;

            // Asigna el valor seleccionado al input
            inputBox.value = selectedValue;
        });
    });
</script>

<!-- ... tu código posterior ... -->


<!--<script>
    $(document).ready(function() {
        $("#service").change(function() {
            var selectedOption = $(this).find("option:selected");
            var selectedServicePrice = selectedOption.data("price");

            // Actualiza el campo de entrada de precio con el precio del servicio seleccionado
            $("#price").val(selectedServicePrice);
        });

        // Agregar una fila a la tabla cuando se haga clic en el botón "Agregar"
        $("#addPayment").click(function() {
            var service = $("#service option:selected").text();
            var price = $("#price").val();
            var patientSelect = $("#patient-name");

            // Verifica si se ha seleccionado un servicio y un paciente antes de agregar la fila
            if (service && price && patientSelect.val()) {
                // Agregar una nueva fila a la tabla con los datos seleccionados
                $("#paymentTable tbody").append('<tr><td></td><td>' + service + '</td><td>' + price + '</td><td><a href="#" class="remove-row">Eliminar</a></td></tr>');

                // Limpiar los campos del formulario después de agregar la fila
                $("#service").val("");
                $("#price").val("");
                patientSelect.addClass("selected").attr("disabled", "disabled");

                // Deshabilitar la selección de servicio después de agregar la fila
                $("#service").prop("disabled", true);

                // Calcular y actualizar la suma de la columna "Importe"
                updateTotalAmount();
            }
        });

        // Eliminar una fila cuando se haga clic en el enlace "Eliminar"
        $(document).on("click", ".remove-row", function(e) {
            e.preventDefault();
            $(this).closest("tr").remove();

            // Habilitar la selección de servicio después de eliminar una fila
            $("#service").prop("disabled", false);

            // Calcular y actualizar la suma de la columna "Importe" después de eliminar una fila
            updateTotalAmount();
        });

        // Función para calcular y actualizar la suma de la columna "Importe" y el valor del input
        function updateTotalAmount() {
            var totalAmount = 0;
            $("#paymentTable tbody tr").each(function() {
                var price = parseFloat($(this).find("td:nth-child(3)").text());
                if (!isNaN(price)) {
                    totalAmount += price;
                }
            });

            // Actualiza el valor en la celda correspondiente en la tabla
            $("#paymentTable tfoot td[name='total-amount']").text(totalAmount.toFixed(2));

            // Asigna el valor calculado al input
            $("#total-amount-input").val(totalAmount.toFixed(2));
        }
    });

    // ... tu código posterior ...
</script>-->

<script>



    $(document).ready(function() {
        $("#select-patient").change(function() {
            var selectedPatient = $(this).val();
            // Asigna el valor seleccionado al campo hidden
            $("input[name='selected-patient']").val(selectedPatient);
        });
    });

    $(document).ready(function() {
    // Escucha el evento de cambio en el campo "total-amount"
    $("#total-amount").on("change", function() {
        // Obtén el valor del campo "total-amount"
        var totalAmount = $(this).text();
        
        // Asigna el valor del importe total al campo de entrada correspondiente
        $("#total-amount-input").val(totalAmount);
    });
});

$(document).ready(function() {
    // Escucha el cambio en el select de servicio
    $("#service").change(function() {
        // Obtiene el valor seleccionado del servicio
        var selectedOption = $(this).find("option:selected");
        var selectedServiceId = selectedOption.val();

        // Asigna el ID del servicio seleccionado al campo de entrada
        $("#service-id-input").val(selectedServiceId);
    });
});




</script>
@endsection
