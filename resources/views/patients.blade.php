@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')

    <!--Filtro de búsqueda de pacientes-->
    <form method="POST" action="{{ route('buscar-pacientes') }}">
        @csrf
        <label for="id">Buscar por ID</label>
        <input type="text" name="id" placeholder="ID del paciente" autocomplete="off">
        <label for="name">Buscar por nombre</label>
        <input type="text" name="name" placeholder="Nombre del paciente" autocomplete="off">
        <label for="psychologist">Buscar por psicólogo</label>
          <select name="psychologist" id="psychologist">
            <option value="" disabled selected>Seleccionar</option>
                @foreach ($psychologists as $psychologist)
                    <option value="{{ $psychologist->id }}">{{ $psychologist->name }}</option>
                @endforeach
            </select>
        <button>Buscar</button>

         <!--Botón para ver de nuevo a todos los pacientes-->
        <form method="GET" action="{{ route('pacientes') }}">
            @csrf
            <button type="submit">Ver todos</button>
        </form>
    </form>
    <a href="{{ route('agregar-pacientes') }}">Agregar</a>

    <!--Tabla con los datos de pacientes-->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Psicólogo asignado</th>
                <th>Estado</th>
                <th>Expediente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->psychologist->name }}</td>
                    <td>{{ $patient->status }}</td>
                    <td><a href="{{ route('ver-expediente' , ['id' => $patient->id]) }}">Expediente</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection