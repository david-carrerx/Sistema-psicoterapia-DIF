@extends('layouts.app')

@section('title', 'Psicólogos')
@section('content')
    
    <h1>Psicólogos</h1>
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