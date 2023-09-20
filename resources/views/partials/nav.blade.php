<!--Barra de navegación-->
<!--Sesiones que se mostrará si el usuario está autenticado-->
@auth
<a href="/dashboard">Inicio</a>
<a href="#">Psicólogos</a>
<a href="#">Pacientes</a>
<a href="#">Pagos</a>
<a href="#">Servicios</a>
<form style="display: inline" action="/logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">
        Cerrar sesión
    </a>
</form>

@endauth

<!--Si se encuentra un mensaje de status este se imprime-->
@if(session('status'))
<br>
{{ session('status')}}
@endif
