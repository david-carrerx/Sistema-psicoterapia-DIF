@extends('layouts.app')

@section('title', 'Psicólogos')
@section('content')

    <!--Estilos de pagos-->
    <link rel="stylesheet" href="{{ asset('css/psychologist.css')}}" rel="stylesheet">

    <div class="container">
        <!--Filtro de búsqueda de psicólogos-->
        <form method="POST" action="{{ route('buscar-psicólogos') }}">
            @csrf
            <!--Encabezado-->
            <div class="row">
                <div class="col-9 order-last"></div>
                <div class="col-5">
                    <label for="name">Buscar por nombre</label>
                </div>
                <div class="col-3 order-first">
                    <label for="id">Buscar por ID</label>
                </div>
            </div>
            <!--Filtro de búsqueda-->
            <div class="row">
                <div class="col-5 order-last">
                    <a href="{{ route('agregar-psicólogos') }}" type="submit" class="custom-button2">Agregar<img src="{{ asset('assets/add.svg')}}" alt="..." class="button-icon"></a>
                    <!--Botón para ver de nuevo todos los pagos-->
                    <form method="GET" action="{{ route('psicólogos') }}">
                        @csrf
                        <button type="submit" class="custom-button">Ver todos</button>
                    </form>
                </div>
                <div class="col-3">
                    <input type="text" name="name" placeholder="Nombre del psicólogo" autocomplete="off">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                <div class="col-3 order-first">
                    <input type="text" name="id" placeholder="ID del psicólogo" autocomplete="off">
                </div>
            </div>  
        </form>
    </div>

    <!--Tabla con los datos de psicólogos-->
    <div style="overflow: scroll; height:550px; margin-top:15px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Email</th>
                    <th>Nacimiento</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($psychologists as $psychologist)
                    <tr>
                        <td class="id">{{ $psychologist->id }}</td>
                        <td>{{ $psychologist->name }}</td>
                        <td>{{ $psychologist->phone }}</td>
                        <td>{{ $psychologist->email }}</td>
                        <td>{{ $psychologist->birthday }}</td>
                        <td>{{ $psychologist->speciality }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection