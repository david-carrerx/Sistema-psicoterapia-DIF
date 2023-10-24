<!--Barra de navegación-->
<!--Secciones que se mostrará si el usuario está autenticado-->
@auth
<nav style="display:flex; flex-direction:column; width: 15%;">
    <img src="#" alt="#">
    <a href="{{ route('perfil') }}">{{ Auth::user()->name }}</a>
    <span>En línea</span>
    <a href="{{ route('home') }}">Inicio</a>
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
</nav>
@endauth