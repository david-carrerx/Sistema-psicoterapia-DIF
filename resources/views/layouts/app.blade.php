<!--Estructura general de las vistas-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicoterapia - @yield('title') </title>
    <script src="/resources/js/register.js"></script>
    <link rel="icon" href="{{asset('assets/icon.png')}}">
</head>
<body>
    <nav style="text-align:center;"><h1>Logo del DIF</h1></nav>
    <main style="display: flex;">
        @include('partials.nav')
        <div style="width: 85%; padding-left:20px;">
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
</body>
</html>