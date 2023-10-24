@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
    <h1>Registro de paciente</h1>
    <form>
        <label for="name">Nombre completo<span>*</span></label>
        <input id="name" type="text" placeholder="Nombre del paciente">
        <label for="age">Edad<span>*</span> </label>
        <input id="age" type="text" placeholder="Edad del paciente">
        <label for="genre">Género<span>*</span></label>
        <input type="checkbox" name="male" id="genre"><span>Masculino</span>
        <input type="checkbox" name="femme" id="genre"><span>Femenino</span>
    </form>
@endsection