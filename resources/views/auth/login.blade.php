@extends('layouts.app-login')

@section('title', 'Iniciar sesión')
@section('content')
    <!--Imagen del borde superior-->
    <div class="header-image"></div>    
        <main>
            <!--Formulario de login de usuario-->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img src="https://www.difdurango.gob.mx/wp-content/uploads/2022/12/dif.svg" class="card-img-top" alt="..." style="margin-bottom: 15px;">
                <label for="email"><span face="Inter" size=5>Correo de usuario</span></label>
                <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                @error('email') <div style="color:red">{{$message}}</div>@enderror
        
                <label for="password"><span face="Inter" size=5>Contraseña</span></label>
                <input id="password" name="password" type="password" placeholder="Contraseña">
                @error('email') <div style="color:red">{{$message}} @enderror
                <br><br>
                <!--<label for=""><span>Recordar sesión</span><input type="checkbox" name="remember" id=""></label>-->
                <!--<label>
                <span>¿No tienes cuenta? <a href="register">registrate aquí</a></span>
                </label>-->
                <button type="submit">Acceder</button>
            </form>
        </main>
    <!--Imagen del borde inferior-->
    <div class="footer-image"></div>
@endsection
