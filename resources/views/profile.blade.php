@extends('layouts.app')

@section('title', 'Perfil')
@section('content')

<!--Se retorna la información del perfil de usuario-->
<h1>{{ $userName }}</h1>
Contador
<h3>Información personal</h3>
<h2>{{ $age }} años</h2>
<h2>{{ $phone }}</h2>
<h2>Ubicación</h2>
<h2>{{ $email }}</h2>

<!--Formulario para que un usuario modifique su foto de perfil-->
<form action="{{ route('upload.profile.picture') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="profile_picture">
    <button type="submit">Subir Foto de Perfil</button>
</form>

<!--Se muestra la foto de perfil-->
<img src="{{ asset('../../storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Foto de perfil">
@endsection