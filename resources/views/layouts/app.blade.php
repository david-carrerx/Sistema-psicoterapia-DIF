<!--Estructura general de las vistas-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicoterapia - @yield('title') </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidemenu.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/icon.png')}}">
</head>
<body>
    <!--Estructura general de las vistas-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="navbar-logo"><img src="https://www.difdurango.gob.mx/wp-content/uploads/2022/12/dif.svg" class="rounded mx-auto d-block" alt="..."></div>
    </nav>
    <main class="container-fluid">
        <div>
            @include('partials.nav')
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </main>
    
    <!--Si se encuentra un mensaje de status este se imprime-->
    @if(session('status'))
        <script>
            document.addEventListener("DOMContentLoaded", function()
            {
                alert("{{ session('status') }}");
            });
        </script>
    @endif

    <!--Scripts necesarios para la función de los estilos del navbar-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/navbar.js')}}"></script>
</body>
</html>