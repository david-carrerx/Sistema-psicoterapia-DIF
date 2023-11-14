@extends('layouts.app')

@section('title', 'Registrar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
<div class="main-content">
    <!--Formulario de registro de usuario-->
    <form method="POST" action="{{ route('registrar')}}" class="container formulario">
        @csrf
        <div class="row">
            <div class="col-12 nav_registro_paciente">
                <h1>Registro</h1>
            </div>
        </div>

        <div class="form-container" style="align-items:center;">
            <!--Nombre de usuario-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="name">Nombre</label>
                    <br><input type="text" id="name" name="name" autofocus required pattern="[A-Za-z\s]+" value="{{ old('name') }}" placeholder="Nombre de usuario" oninput="capitalizeWords(this)" title="No puede ingresar caractéres especiales solo letras" autocomplete="off">
                </div>
                <div class="alert-danger">@error('name') {{$message}} @enderror</div>
            </div>
            <!--Contraseña de usuario-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="password">Contraseña</label>
                    <br><input name="password" type="password" placeholder="Contraseña">
                    <strong>@error('password') Las contraseñas no coinciden @enderror</strong>
                </div>
            </div>
            <!--Confirmar contraseña de usuario-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="password_confirmation">Confirmar contraseña</label>
                    <br><input name="password_confirmation" type="password" placeholder="Contraseña">
                </div>
                @error('password_confirmation') {{$message}} @enderror
            </div>
            <!--Rol de usuario-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="role">Rol de usuario</label>
                    <br><select name="role" required id="role">
                        <option value="Contador">Contador</option>
                        <option value="Administrador">Administrador</option>
                        </select>
                </div>
                @error('role') {{$message}} @enderror
            </div>
            <!--Fecha de nacimiento-->
            <div class="row justify-content-center" name="row_form">
                <div class="col-6"><label for="birthday">Fecha de nacimiento</label>
                    <br><input name="birthday" type="date" required value="{{ old('birthday') }}" placeholder="Fecha de nacimiento">
                </div>
                @error('birthday') {{$message}} @enderror
            </div>
            <!--Teléfono de usuario-->
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
            <div class=" row m-0 text-center align-items-center justify-content-center">
                <button name="button-save" class="button-save" type="submit" style="margin-top:25px; margin-bottom:25px;">Registrar</button>
            </div>
        </div>
    </form>
</div>
<!--Script para el funcionamiento de el formulario.-->
<script src="{{ asset('js/auth.js')}}"></script>
@endsection