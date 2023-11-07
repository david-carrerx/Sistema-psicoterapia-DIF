@extends('layouts.app')

@section('title', 'Pagos')
@section('content')
<h1>Datos del cobro</h1>
<div>
    <div class="row">
        <div class="col order-last"></div>
        <div class="col">
            <label for="service">Servicio</label>
        </div>
        <div class="col psy">
            <label for="price">Importe</label>
        </div>
        <div class="col order-first">
            <label for="name">Nombre</label>
        </div>
    </div>

    <form action="{{ route('guardar-datos') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col order-last"></div>
        <div class="col">
            <select name="service" id="service">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col psy">
            <input id="price" name="price" type="text" placeholder="Precio" autofocus readonly required>
        </div>
        <div class="col order-first">
            <select name="name" id="select-patient" required>
                <option value="">Selecciona un paciente</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
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
            <td id="total-amount"></td>
            <td><button type="submit">Agregar pago</button></form></td>
        </tr>
    </tfoot>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            var patientSelect = $("#select-patient");

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

        // Función para calcular y actualizar la suma de la columna "Importe"
        function updateTotalAmount() {
            var totalAmount = 0;
            $("#paymentTable tbody tr").each(function() {
                var price = parseFloat($(this).find("td:nth-child(3)").text());
                if (!isNaN(price)) {
                    totalAmount += price;
                }
            });

            // Actualiza el valor en el <td> del "Importe total"
            $("#total-amount").text(totalAmount.toFixed(2)); // Asegura que se muestre con 2 decimales
        }
    });

</script>
@endsection
