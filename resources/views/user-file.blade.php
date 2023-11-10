@extends('layouts.app')

@section('title', 'Paciente')
@section('content')

<!--Estilos del paciente-->
<link rel="stylesheet" href="{{ asset('css/patients.css')}}" rel="stylesheet">

<!--Mensaje de editado exitoso-->
@if (isset($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<!-- Formulario para ver y editar usuarios. -->
<form id="user-form" method="POST" action="{{ route('actualizar-usuario' , ['id' => $users->id]) }}">
    @csrf
    <!--Nombre completo, fecha de nacimiento y género-->
    <div>
        <label for="name" style="font-weight: bold;">Nombre completo<span>*</span></label>
        <input type="text" name="name" id="name" value="{{ $users->name }}" pattern="[A-Za-z\s]+" disabled autocomplete="off">
        <label for="email" style="font-weight: bold;">Email<span>*</span></label>
        <input type="text" name="email" id="email" value="{{ $users->email }}" disabled autocomplete="off">
        <label for="birthday" style="font-weight: bold;">Fecha de nacimiento<span>*</span></label>
        <input type="date" name="birthday" id="birthday" value="{{ $users->birthday }}" disabled autocomplete="off">
        <label for="phone" style="font-weight: bold;">Celular<span>*</span></label>
        <input type="text" name="phone" id="phone" min="1" max="120" required maxlength="10" pattern="\d{10}" value="{{ $users->phone }}" disabled autocomplete="off">
        <select name="role" id="role" disabled>
            <option value="Administrador" {{ $users->role === 'Administrador' ? 'selected' : '' }}>Administrador</option>
            <option value="Contador" {{ $users->role === 'Contador' ? 'selected' : '' }}>Contador</option>
        </select>
    </div>

    <div>
        <button type="button" id="edit">Editar</button>
        <button type="submit" id="save" style="display: none;">Guardar</button>
        <button type="button" id="cancel" style="display: none;">Cancelar</button>
    </div>
</form>

<!--Script necesario para el funcionamiento del sistema-->
<script src="{{ asset('js/user_form.js') }}"></script>
@endsection