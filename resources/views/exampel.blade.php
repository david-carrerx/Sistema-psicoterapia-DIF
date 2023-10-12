@extends('layouts.app')

@section('title', 'Psicólogos')
@section('content')
    
    <h1>Psicólogos</h1>
    <!--Se retorna la información del perfil de los psicólogos-->
    @foreach ($psychologists as $psychologist)
    @php
        $birthday = \Carbon\Carbon::parse($psychologist->birthday);
        $age = $birthday->age;
    @endphp
    <h1>{{ $psychologist->name }}</h1>
    <h2>{{ $psychologist->description }}</h2>
    <h2>{{ $psychologist->speciality }}</h2>
    <h2>{{ $age }}</h2>
    <h2>{{ $psychologist->phone }}</h2>    
    <h2>{{ $psychologist->email }}</h2>
    @endforeach
    
@endsection