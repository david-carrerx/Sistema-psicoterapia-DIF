@extends('layouts.app')

@section('title', 'Psicólogo')
@section('content')

<!--Se muestra la foto de perfil del psicólogo-->
<!-- <img src="{/{ asset('../../storage/profile_pictures/' . $psychologists->profile_image) }}" alt="Foto de perfil"> -->

<!--Se retorna la información del perfil del psicólogo-->
<h1>{{ $psychologists->name }}</h1>
<h2>{{ $psychologists->speciality}}</h2>
<h3>Información personal</h3>
<h2>{{ $psychologists->description }}</h2>
<h2>{{ $age }} años</h2>
<h2>{{ $psychologists->phone }}</h2>
<h2>Durango / México</h2>    
<h2>{{ $psychologists->email }}</h2>

@endsection