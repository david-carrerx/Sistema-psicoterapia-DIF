@extends('layouts.app')

@section('title', 'Iniciar sesión')
@section('content')
    <h1>Iniciar sesión</h1>

     <!--Formulario de login de usuario-->
     <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="">
            <input name="email" type="email" required autofocus value="{{ old('email') }}" placeholder="Email" autocomplete="off">
        </label>
        @error('email') {{$message}} @enderror
        <br>
        <label for="">
            <input name="password" type="password" placeholder="Contraseña">
        </label>
        @error('password') {{$message}} @enderror
        <br>
        <label for="">
            <input type="checkbox" name="remember" id="">
            Recordar sesión
        </label><br>
        <label>
            <span>¿No tienes cuenta? <a href="register">registrate aquí</a></span>
        </label>
        <button type="submit">Acceder</button>
    </form>
@endsection