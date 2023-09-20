<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DIF - Psicoterapia</title>
</head>
<body>
    @include('partials.nav')
    <h1>login</h1>

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
</body>
</html>