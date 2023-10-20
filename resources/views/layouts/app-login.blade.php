<!--Estructura general de la vista login-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicoterapia - @yield('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login-styles.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/icon.png')}}">
</head>
<body>
    @include('partials.nav')
    @yield('content')
    <!--Si se encuentra un mensaje de status este se muestra como alerta-->
    @if(session('status'))
        <script>
            document.addEventListener("DOMContentLoaded", function()
            {
                alert("{{ session('status') }}");
            });
        </script>
    @endif
</body>
</html>