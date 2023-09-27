<!--Estructura general de las vistas-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicoterapia - @yield('title') </title>
</head>
<body>
    @include('partials.nav')
    
    <!--Si se encuentra un mensaje de status este se imprime-->
    @if(session('status'))
    <br>
    {{ session('status')}}
    @endif

    @yield('content')
</body>
</html>