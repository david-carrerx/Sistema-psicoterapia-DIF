@extends('layouts.app')

@section('title', 'Registrar')
@section('content')
    <h1>Registro</h1>

     <!--Formulario de registro de usuario-->
     <form method="POST" action="{{ route('register')}}">
        @csrf
        <!--Nombre de usuario-->
        <label for="name">
            <span>Nombre</span>
            <input type="text" id="name" name="name" autofocus required pattern="[A-Za-z\s]+" value="{{ old('name') }}" placeholder="Nombre de usuario" title="No puede ingresar caractéres especiales solo letras" autocomplete="off">
        </label>
        @error('name') {{$message}} @enderror
        <br>

        <!--Contraseña de usuario-->
        <label for="">
            <span>Contraseña</span>
            <input name="password" type="password" placeholder="Contraseña">
        </label>
        @error('password') {{$message}} @enderror
        <br>

        <!--Confirmar contraseña de usuario-->
        <label for="">
            <span>Confirmar contraseña</span>
            <input name="password_confirmation" type="password" placeholder="Contraseña">
        </label>
        @error('password_confirmation') {{$message}} @enderror
        <br>

        <!--Edad de usuario-->
        <label for="">
            <span>Nacimiento</span>
            <input name="birthday" type="date" required value="{{ old('birthday') }}" placeholder="Fecha de nacimiento">
        </label>
        @error('birthday') {{$message}} @enderror
        <br>

        <!--Teléfono de usuario-->
        <label for="phone">
            <span>Teléfono</span>
            <input name="phone" type="text" min="1" max="120" required maxlength="10" pattern="\d{10}" value="{{ old('phone') }}" placeholder="Número" title="Solo puede ingresar 10 digitos numericos" autocomplete="off">
        </label>
        @error('phone') {{$message}} @enderror
        <br>

        <!--Correo electrónico de usuario-->
        <label for="email">
            <span>Correo Electrónico</span>
            <input name="email" type="email" required autofocus value="{{ old('email') }}" placeholder="Correo electrónico" autocomplete="off">
        </label>
        @error('email') {{$message}} @enderror
        <br>

        <!--Redirección al inicio de sesión-->
        <label>
            <span>¿Ya tienes cuenta? <a href="login">inicia sesión aquí</a></span>
        </label>
        <button type="submit">Registrar</button>
    </form>
@endsection