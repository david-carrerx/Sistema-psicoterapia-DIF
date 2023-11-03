<!--Barra de navegación-->
<!--Secciones que se mostrará si el usuario está autenticado-->
@auth
<nav id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item top-perfil" data-href="{{ route('perfil') }}">
            <img src="https://us.123rf.com/450wm/alekseyvanin/alekseyvanin1704/alekseyvanin170403663/76699411-vector-de-icono-de-usuario-ilustraci%C3%B3n-de-logotipo-s%C3%B3lido-de-perfil-pictograma-aislado-en-blanco.jpg" style=" width:35%; height:50%; " alt="Foto de perfil">
            <div class="cont-data" id="user-info">
                <a href="{{ route('perfil') }}">{{ explode(' ', Auth::user()->name)[0] }}</a>
                <p>En linea<img src="{{ asset('assets/c1.png') }}" alt=""></p>
            </div>
        </li>
        <li class="nav-item {{ request()->is('home*') ? 'active' : '' }} width" data-href="{{ route('home') }}" style="height:50px;" >
            <div class="icon"><img src="{{asset('assets/home.svg')}}" alt="Inicio"></div>
            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav-item {{ request()->is(['psicólogos*', 'buscar-psicólogos*', 'perfil-psicólogo*']) ? 'active' : '' }}" data-href="{{ route('psicólogos') }} " style="height:50px;" >
            <div class="icon"><img src="{{ asset('assets/psy.png') }}" alt="Psicólogo"></div>
            <a class="nav-link" href="{{ route('psicólogos') }}">Psicólogos</a>
        </li>
        <li class="nav-item {{ request()->is(['pacientes*', 'buscar-pacientes*', 'agregar-pacientes*', 'ver-expediente*', 'actualizar-expediente*']) ? 'active' : '' }}" data-href="{{ route('pacientes') }}" style="height:50px;">
            <div class="icon"><img src="{{ asset('assets/user.png') }}" alt="Usuario"></div>
            <a class="nav-link" href="{{ route('pacientes') }}">Pacientes</a>
        </li>
        <li class="nav-item {{ request()->is('pagos*') ? 'active' : '' }}" data-href="{{ route('pagos') }}" style="height:50px;">
            <div class="icon"><img src="{{ asset('assets/history.png') }}" alt="Pagos"></div>
            <a class="nav-link" href="{{ route('pagos') }}">Pagos</a>
        </li>
        <li class="nav-item {{ request()->is('servicios*') ? 'active' : '' }}" data-href="{{ route('servicios') }}" style="height:50px;">
            <div class="icon"><img src="{{ asset('assets/services.png') }}" alt="Servicios"></div>
            <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
        </li>
        <li class="nav-item" id="logout-container" onclick="this.querySelector('form').submit();" style="height:50px;">
            <div class="icon"><img src="{{ asset('assets/logout.png') }}" alt="Cerrar sesión"></div>
            <form action="/logout" method="POST">
                @csrf
                <a class="nav-link" href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>
            </form>
        </li>
    </ul>
</nav>
@endauth