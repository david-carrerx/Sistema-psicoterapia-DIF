@extends('layouts.app')

@section('title', 'Psicólogos')
@section('content')

    <!--Filtro de búsqueda de psicólogos-->
    <form method="POST" action="{{ route('buscar-psicólogos') }}">
        @csrf
        <label>Buscar por ID</label>
        <input type="text" name="id" placeholder="ID del psicólogo" autocomplete="off">
        <label>Buscar por nombre</label>
        <input type="text" name="name" placeholder="Nombre del psicólogo" autocomplete="off">
        <button>Buscar</button>

         <!--Botón para ver de nuevo a todos los psicólogos-->
        <form method="GET" action="{{ route('psicólogos') }}">
            @csrf
            <button type="submit">Ver todos</button>
        </form>
    </form>

    <!--Se retorna la información del perfil de los psicólogos-->
    @foreach ($psychologists as $psychologist)
    <div>
        <!-- <img src="{/{ asset('../../storage/profile_pictures/' . $psychologist->profile_image) }}" alt="Foto de perfil"> -->
        <h2>{{ $psychologist->name }}</h2>
        <h3>{{ $psychologist->description }}</h3>
        <button>Ver perfil</button>
    </div>
    @endforeach
@endsection