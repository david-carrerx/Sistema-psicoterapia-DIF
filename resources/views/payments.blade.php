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
                    <label for="patient">Buscar por fecha</label>
                </div>
                <div class="col psy">
                    <label for="date">Buscar paciente</label>
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
                    <input type="date" name="date" placeholder="Seleccionar" autocomplete="off">
                </div>
                <div class="col psy">
                    <select name="patient" id="patient">
                        <option value="" disabled selected>Seleccionar</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                <div class="col order-first">
                    <select name="service" id="service">
                        <option value="" disabled selected>Seleccionar</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>                            
        </form>
    </div>
    <br>
    <!--Tabla con los datos de pacientes-->
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="id">ID</th>
                <th>Nombre</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Estado</th>
                <th>Imprimir</th>
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
                    <td><div class="estado-container activo">{{ $payment->status }}</div></td>
                    <td><a type="button" href="#" class="expediente-button">Imprimir</a></td>
                    <td><a type="button" href="#" class="eliminar-button">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection