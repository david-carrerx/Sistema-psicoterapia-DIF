@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
    <!--Estilos del paciente-->
    <link rel="stylesheet" href="{{ asset('css/patients.css')}}" rel="stylesheet">

    <!--Filtro de búsqueda de pacientes-->
    <div class="container">
        <form method="POST" action="{{ route('buscar-pacientes') }}">
            @csrf
            <div class="row">
                <div class="col order-last"></div>
                <div class="col">
                    <label for="psychologist">Buscar por nombre</label>
                </div>
                <div class="col psy">
                    <label for="name">Buscar por psicólogo</label>
                </div>
                <div class="col order-first">
                    <label for="id">Buscar por ID</label>
                </div>
            </div>

            <div class="row">
                <div class="col order-last">
                    <!--Botón para ver de nuevo a todos los pacientes-->
                    <a href="{{ route('pacientes') }}" type="submit" class="custom-button">Ver todos<img src="{{ asset('assets/filter.svg') }}" alt="..." class="button-icon"> </a>
                    <a href="{{ route('agregar-pacientes') }}" type="submit" class="custom-button2">Agregar<img src="{{ asset('assets/add.svg')}}" alt="..." class="button-icon"></a>
                </div>

                <div class="col">
                    <input type="text" name="name" placeholder="Nombre del paciente" autocomplete="off">
                </div>
                <div class="col psy">
                    <input type="text" name="psychologist" id="searchPsychologist" placeholder="Buscar psicólogo" autocomplete="off">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                <div class="col order-first">
                    <input type="text" name="id" placeholder=" ID del paciente" autocomplete="off">
                </div>
            </div>                            
        </form>
    </div>
    <br>

    <div style="overflow: scroll; height:550px;">
        <!--Tabla con los datos de pacientes-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="id">ID</th>
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
                        <td class="id">{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->psychologist->name }}</td>
                        <td><div class="estado-container activo">{{ $patient->status }}</div></td>
                        <td><a type="button" href="{{ route('ver-expediente' , ['id' => $patient->id]) }}" class="expediente-button">Expediente<img src="{{asset('assets/eye.png')}}" alt="..." class="button-icono"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Función para manejar el evento de entrada en el campo de búsqueda
            $('#searchPsychologist').on('input', function () {
                var searchText = $(this).val().toLowerCase();
    
                // Filtrar las opciones de psicólogos que coincidan con el texto de búsqueda
                $('.psy-select-option').each(function () {
                    var optionText = $(this).text().toLowerCase();
    
                    // Mostrar u ocultar la opción según si coincide con el texto de búsqueda
                    if (optionText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    

@endsection