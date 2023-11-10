@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
    <!--Estilos del usuario-->
    <link rel="stylesheet" href="{{ asset('css/users.css')}}" rel="stylesheet">

    <!--Filtro de búsqueda de pacientes-->
    <div class="container">
        <form method="POST" action="{{ route('buscar-usuarios') }}">
            @csrf
            <div class="row">
                <div class="col order-last"></div>
                <div class="col">
                    <label for="user">Buscar por nombre</label>
                </div>
                <div class="col psy">
                    <label for="email">Buscar por correo</label>
                </div>
                <div class="col order-first">
                    <label for="id">Buscar por ID</label>
                </div>
            </div>

            <div class="row">
                <div class="col order-last">
                    <!--Botón para ver de nuevo a todos los usuarios-->
                    <a href="{{ route('usuarios') }}" type="submit" class="custom-button">Ver todos<img src="{{ asset('assets/filter.svg') }}" alt="..." class="button-icon"> </a>
                    <a href="{{ route('registrar') }}" type="submit" class="custom-button2">Agregar<img src="{{ asset('assets/add.svg')}}" alt="..." class="button-icon"></a>
                </div>
                <div class="col">
                    <input type="text" name="user" placeholder="Nombre del usuario" autocomplete="off">
                </div>
                <div class="col psy">
                    <input type="text" id="email" name="email" placeholder=" Email del usuario" autocomplete="off">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                <div class="col order-first">
                    <input type="text" name="id" placeholder=" ID del usuario" autocomplete="off">
                </div>
            </div>                            
        </form>
    </div>
    <br>

    <div style="overflow: scroll; height:550px;">
        <!--Tabla con los datos de usuarios-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Nacimiento</th>
                    <th>Rol</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="id">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a type="button" href="{{ route('ver-usuario' , ['id' => $user->id]) }}" class="expediente-button">Editar<img src="{{asset('assets/edit.png')}}" alt="..." class="button-icono"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection