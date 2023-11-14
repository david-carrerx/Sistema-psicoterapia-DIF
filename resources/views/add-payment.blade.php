@extends('layouts.app')

@section('title', 'Pagos')
@section('content')
<!--Estilos de la vista-->
<link rel="stylesheet" href="{{ asset('css/add-payment.css') }}">
<div class="main-content">
    <!--Formulario para subir los datos del pago-->
    <form action="{{ route('guardar-datos') }}" method="POST" class="container formulario">
        @csrf
        <div class="row">
            <div class="col-12 nav_registro_paciente">
                <h1>Datos del cobro</h1>
            </div>
        </div>

        <div class="container">
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
                        <option value="" disabled selected>Selecciona un servicio</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                    <input id="service-id-input" name="service-id" type="hidden" placeholder="ID del servicio" readonly>
                </div>
                <div class="col psy">
                    <input id="price" name="price" type="text" placeholder="Precio" autofocus readonly required>
                    <input type="hidden" name="total-amount" id="total-amount-input" value="">
                    <button type="button" name="button-save" class="button-save btn-success" id="addPayment">Agregar<img src="{{ asset('assets/cart.png')}}" alt="..." class="button-icono"></button>
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
            </div>
        </div>
    <!--Tabla para ver la información del pago.-->
    <table id="paymentTable" class="table table-striped">
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
                <td name="total-amount" id="total-amount">...</td>
                <td><button name="button-save2" class="button-save2" type="submit">Registrar<img src="{{ asset('assets/add.svg')}}" alt="..." class="button-icono"></button></td>
            </tr>
        </tfoot>
    </table>
    </form>
</div>
<!-- Scripts necesarios para el funcionamiento del agregado. -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/payments.js') }}"></script>
@endsection