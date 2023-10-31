@extends('layouts.app')

@section('title', 'Paciente')
@section('content')

<!--Mensaje de editado exitoso-->
@if (isset($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<!-- Formulario para ver y editar pacientes. -->
<form id="patient-form" method="POST" action="{{ route('actualizar-expediente' , ['id' => $patients->id]) }}">
    @csrf
    <!--Nombre completo, fecha de nacimiento y género-->
    <div>
        <label for="name" style="font-weight: bold;">Nombre completo<span>*</span></label>
        <input type="text" name="name" value="{{ $patients->name }}" pattern="[A-Za-z\s]+" disabled autocomplete="off">
        <label for="age" style="font-weight: bold;">Fecha de nacimiento<span>*</span></label>
        <input type="date" name="age" value="{{ $patients->age }}" disabled>
        <label for="gender" style="font-weight: bold;">Género<span>*</span></label>
        <select name="gender" id="gender" disabled>
            <option value="masculino" {{ $patients->gender === 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $patients->gender === 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>

    <!--Estado civil, escolaridad y celular-->
    <div>
        <label for="civil_status" style="font-weight: bold;">Estado civil<span>*</span></label>
        <select name="civil_status" id="civil_status" disabled>
            <option value="soltero" {{ $patients->civil_status === 'soltero' ? 'selected' : '' }}>Soltero</option>
            <option value="casado" {{ $patients->civil_status === 'casado' ? 'selected' : '' }}>Casado</option>
            <option value="divorciado" {{ $patients->civil_status === 'divorciado' ? 'selected' : '' }}>Divorciado</option>
            <option value="viudo" {{ $patients->civil_status === 'viudo' ? 'selected' : '' }}>Viudo</option>
        </select>
        <label for="scholarship" style="font-weight: bold;">Escolaridad<span>*</span></label>
        <select name="scholarship" id="scholarship" disabled>
            <option value="capacitacion" {{ $patients->scholarship === 'capacitacion' ? 'selected' : '' }}>Capacitación</option>
            <option value="medio-basico" {{ $patients->scholarship === 'medio-basico' ? 'selected' : '' }}>Medio básico</option>
            <option value="medio-superior" {{ $patients->scholarship === 'medio-superior' ? 'selected' : '' }}>Medio superior</option>
            <option value="superior" {{ $patients->scholarship === 'superior' ? 'selected' : '' }}>Superior</option>
            <option value="posgrado" {{ $patients->scholarship === 'posgrado' ? 'selected' : '' }}>Posgrado</option>
            <option value="ninguna" {{ $patients->scholarship === 'ninguna' ? 'selected' : '' }}>Ninguna</option>
        </select>
        <label for="phone" style="font-weight: bold;">Celular<span>*</span></label>
        <input type="text" name="phone" value="{{ $patients->phone }}" min="1" max="120" required maxlength="10" pattern="\d{10}" disabled autocomplete="off">
    </div>

    <!--Domicilio, ocupación y religión-->
    <div>
        <label for="address" style="font-weight: bold;">Domicilio<span>*</span></label>
        <input type="text" name="address" value="{{ $patients->address }}" disabled autocomplete="off">
        <label for="job" style="font-weight: bold;">Ocupación<span>*</span></label>
        <input type="text" name="job" value="{{ $patients->job }}" disabled autocomplete="off">
        <label for="religion" style="font-weight: bold;">Religión</label>
        <input type="text" name="religion" value="{{ $patients->religion }}" disabled autocomplete="off">
    </div>

    <!--Motivo de consulta-->
    <div>
        <label for="checkbox" style="font-weight: bold;">Motivo de la consulta</label>
        <span>a) ¿Ha recibido ayuda piscológica por otra situación?</span>
        @if ($patients->checkbox == null)
            <input type="text" name="checkbox" value="No" disabled readonly>
        @elseif ($patients->checkbox == 'yes')
            <input type="text" name="checkbox" value="Si" disabled readonly>
        @else
            <input type="text" name="checkbox" value="No" disabled readonly>
        @endif
    </div>

    <!--Tiempo y motivo-->
    <div>
        <label for="time" style="font-weight: bold;">Tiempo</label>
        <input type="text" name="time" value="{{ $patients->time }}" disabled autocomplete="off">
        <label for="reason" style="font-weight: bold;">Motivo</label>
        <input type="text" name="reason" value="{{ $patients->reason }}" disabled autocomplete="off">
    </div>

    <!--Descripción-->
    <div>
        <label for="description" style="font-weight: bold;">Descripción</label>
        <input type="text" name="description" value="{{ $patients->description }}" disabled autocomplete="off">
    </div>
        
    <!--Psicólogo y servicio-->
    <div>
        <label for="psychologist" style="font-weight: bold;">Psicólogo</label>
        <input type="text" name="psychologist" value="{{ $patients->psychologist->name }}" disabled readonly>
        <label for="service" style="font-weight: bold;">Servicio</label>
        <input type="text" name="service" value="{{ $patients->service->name }}" disabled readonly>
    </div>
    
    <!--Botones-->
    <div>
        <button type="button" id="edit">Editar</button>
        <button type="submit" id="save" style="display: none;">Guardar</button>
        <button type="button" id="cancel" style="display: none;">Cancelar</button>
    </div>
</form>
<script src="{{ asset('js/patients_form.js') }}"></script>
@endsection