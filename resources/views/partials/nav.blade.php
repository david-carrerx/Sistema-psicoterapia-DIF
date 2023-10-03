<!--Barra de navegación-->
<!--Secciones que se mostrará si el usuario está autenticado-->
@auth
<a href="{{ route('home') }}">Inicio</a>
<a href="{{ route('perfil') }}">{{ Auth::user()->name }}</a>
<a href="{{ route('psicólogos') }}">Psicólogos</a>
<a href="{{ route('pacientes') }}">Pacientes</a>
<a href="{{ route('pagos') }}">Pagos</a>
<a href="{{ route('servicios') }}">Servicios</a>
<form style="display: inline" action="/logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">
        Cerrar sesión
    </a>
</form>


@endauth