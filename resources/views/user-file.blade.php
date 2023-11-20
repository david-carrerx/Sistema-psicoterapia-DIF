@extends('layouts.app')

@section('title', 'Paciente')
@section('content')

<!--Estilos del paciente-->
<link rel="stylesheet" href="{{ asset('css/edit.css')}}" rel="stylesheet">

<div class="main-content">

    <!--Mensaje de editado exitoso-->
    @if (isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <!-- Formulario para ver y editar usuarios. -->
<form id="user-form" method="POST" action="{{ route('actualizar-usuario' , ['id' => $users->id]) }}" class="container formulario">
    @csrf
    <div class="row">
        <div class="col-12 nav_registro_paciente">
            <h1>Usuario</h1>
        </div>
    </div>

    <div class="form-container" style="align-items:center;">
        <!--Nombre completo, fecha de nacimiento y género-->
        <div class="row justify-content-center" name="row_form">
            <div class="col-6"><label for="name">Nombre completo</label>
                <br><input type="text" name="name" id="name" value="{{ $users->name }}" pattern="[A-Za-z\s]+" disabled autocomplete="off">
            </div>
        </div>

        <div class="row justify-content-center" name="row_form">
            <div class="col-6"><label for="email">Email</label>
                <br><input type="text" name="email" id="email" value="{{ $users->email }}" disabled autocomplete="off">
            </div>
        </div>

        <div class="row justify-content-center" name="row_form">
            <div class="col-6"><label for="birthday">Fecha de nacimiento</label>
                <br><input type="date" name="birthday" id="birthday" value="{{ $users->birthday }}" disabled autocomplete="off">
            </div>
        </div>

        <div class="row justify-content-center" name="row_form">
            <div class="col-6"><label for="phone">Celular</label>
                <br><input type="text" name="phone" id="phone" min="1" max="120" required maxlength="10" pattern="\d{10}" value="{{ $users->phone }}" disabled autocomplete="off">
            </div>
        </div>

        <div class="row justify-content-center" name="row_form">
            <div class="col-6"><label for="role">Rol de usuario</label>
                <br><select name="role" id="role" disabled>
                    <option value="Administrador" {{ $users->role === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="Contador" {{ $users->role === 'Contador' ? 'selected' : '' }}>Contador</option>
                    </select>
            </div>
            @error('role') {{$message}} @enderror
        </div>

        <div class=" row m-0 text-center align-items-center justify-content-center">
            <button name="button-edit" class="button-edit" id="edit" type="button" style="margin-top:25px; margin-bottom:25px;">Editar</button>
        </div>

        <div class=" row m-0 text-center align-items-center justify-content-center">
            <button name="button-save" class="button-save" id="save" type="submit" style="margin-top:25px; display: none;">Guardar</button>
        </div>

        <div class=" row m-0 text-center align-items-center justify-content-center">
            <button name="button-cancel" class="button-cancel" id="cancel" type="button" style="margin-top:5px; display: none; margin-bottom:25px;">Cancelar</button>
        </div>

        

        <div>
            <!--<button type="button" id="edit">Editar</button>-->
            <!--<button type="submit" id="save" style="display: none;">Guardar</button>-->
            <!--<button type="button" id="cancel" style="display: none;">Cancelar</button>-->
        </div>
    </div>
</form>
</div>

<!--Script necesario para el funcionamiento del sistema-->
<script src="{{ asset('js/user_form.js') }}"></script>
@endsection