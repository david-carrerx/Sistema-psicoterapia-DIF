@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
    <h1>Pacientes</h1>
    <a href="{{ route('agregar-pacientes') }}">Agregar</a>
@endsection