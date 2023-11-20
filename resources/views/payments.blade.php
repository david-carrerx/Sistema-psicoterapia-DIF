@extends('layouts.app')

@section('title', 'Pagos')
@section('content')

<!--Estilos de pagos-->
<link rel="stylesheet" href="{{ asset('css/payments.css')}}" rel="stylesheet">

    <!--Filtro de búsqueda de pagos-->
    <div class="container">
        <form method="POST" action="{{ route('buscar-pagos') }}">
            @csrf
            <div class="row">
                <div class="col order-last"></div>
                <div class="col">
                    <label for="date">Inicio</label>
                </div>
                <div class="col psy">
                    <label for="patient-name">Buscar paciente</label>
                </div>
                <div class="col order-first">
                    <label for="service">Buscar por servicio</label>
                </div>
            </div>

            <div class="row">
                <div class="col order-last">
                    <!--Botón para ver de nuevo todos los pagos-->
                    <a href="{{ route('pagos') }}" type="submit" class="custom-button">Ver todos<img src="{{ asset('assets/filter.svg') }}" alt="..." class="button-icon"> </a>
                    <a href="{{ route('agregar-pago') }}" type="submit" class="custom-button2">Agregar<img src="{{ asset('assets/add.svg')}}" alt="..." class="button-icon"></a>
                </div>

                <div class="col">
                    <input type="date" name="date" placeholder="Fecha de inicio" autocomplete="off">
                    <label for="date2" style="margin-top: 10px;">Fin</label><input type="date" name="date2" placeholder="Fecha de fin" autocomplete="off">
                </div>

                <div class="col psy">
                    <input type="text" name="patient-name" id="patient-name" placeholder="Buscar paciente" autocomplete="off">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                <div class="col order-first">
                    <select name="service" id="service">
                        <option value="" disabled selected>Seleccionar</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                    </select>
                    <label for="cashier" style="margin-top: 10px;">Buscar por cajero</label><input type="text" name="cashier" id="searchCashier" placeholder="Buscar cajero" autocomplete="off">
                </div>
            </div>                            
        </form>
    </div>
    <br>
    <!--Tabla con los datos de pacientes-->
    <div style="overflow: scroll; height:550px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th>Tickets</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="id">{{ $payment->id }}</td>
                        <td>{{ $payment->patient->name }}</td>
                        <td>{{ $payment->service->name }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->price }}</td>
                        <td><div class="estado-container {{ $payment->status === 'Activo' ? 'Activo' : 'Inactivo'}}">{{ $payment->status }}</div></td>
                        <td><a type="button" href="{{ route('generar-ticket', ['id' => $payment->id]) }}" class="expediente-button">Imprimir</a></td>
                        <td><a type="button" onclick="returnconfirm('¿Estás seguro de eliminar este registro? Esta acción no se puede deshacer.');" href="{{ route('eliminar-pago', ['id' => $payment->id]) }}" class="eliminar-button" id="change-status">Eliminar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection