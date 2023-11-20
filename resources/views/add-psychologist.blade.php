@extends('layouts.app')

@section('title', 'Registrar-psicólogo')
@section('content')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
<div class="main-content">
    <!--Formulario de registro del psicólogo-->
    <form method="POST" action="{{ route('agregar-psicólogos')}}" class="container formulario">
        @csrf
        <div class="row">
            <div class="col-12 nav_registro_paciente">
                <h1>Agregar psicólogos</h1>
            </div>
        </div>

        <div class="form-container" style="align-items:center;">
            <!--Nombre de psicólogo-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="name">Nombre</label>
                    <br><input type="text" id="name" name="name" autofocus required pattern="[A-Za-z\s]+" value="{{ old('name') }}" placeholder="Nombre de usuario" oninput="capitalizeWords(this)" title="No puede ingresar caractéres especiales solo letras" autocomplete="off">
                </div>
                <div class="alert-danger">@error('name') {{$message}} @enderror</div>
            </div>
            <!--Descripción de psicólogo-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="description">Descripción</label>
                    <br><input name="description" type="text" placeholder="Descripción" required>
                </div>
            </div>
            <!--Especialidad de psicólogo-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="speciality">Especialidad</label>
                    <br><input name="speciality" type="text" placeholder="Especialidad" required>
                </div>
            </div>
            <!--Teléfono de psicólogo-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="phone">Teléfono</label>
                    <br><input name="phone" type="text" min="1" max="120" required maxlength="10" pattern="\d{10}" value="{{ old('phone') }}" placeholder="Número" title="Solo puede ingresar 10 digitos numericos" autocomplete="off">
                </div>
                @error('phone') {{$message}} @enderror
            </div>
            <!--Correo electrónico de usuario-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="email">Correo electrónico</label>
                    <br><input name="email" type="email" required autofocus value="{{ old('email') }}" placeholder="Correo electrónico" autocomplete="off">
                    <strong>@error('email') El email ya está registrado @enderror</strong>
                </div>
            </div>
            <!--Fecha de nacimiento-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="birthday">Fecha de nacimiento</label>
                    <br><input name="birthday" type="date" required value="{{ old('birthday') }}" placeholder="Fecha de nacimiento">
                </div>
                @error('birthday') {{$message}} @enderror
            </div>
            <div class=" row m-0 text-center align-items-center justify-content-center">
                <button name="button-save" class="button-save" type="submit" style="margin-top:25px; margin-bottom:25px;">Registrar</button>
            </div>
        </div>
    </form>
</div>
<!--Script para el funcionamiento de el formulario.-->
<script src="{{ asset('js/auth.js')}}"></script>
@endsection