@extends('layouts.app')

@section('title', 'Pagos')
@section('content')
<h1>Datos del cobro</h1>
<div>
    <!--Formulario para subir los datos del pago-->
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
                <td><button type="submit">Agregar pago</button></td>
            </tr>
        </tfoot>
    </table>
    
    </form>

<!--Scripts necesarios para el funcionamiento del agregado.-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
<script src="{{ asset('js/payments.js') }}"></script>
@endsection