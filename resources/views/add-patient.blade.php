@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
    <h1>Registro de paciente</h1>
    <!--Formulario para registro de pacientes.-->
    <form id="patient-form" method="POST" action="/agregar-pacientes">
        @csrf
        <div>
            <label for="name">Nombre completo<span>*</span></label>
            <input id="name" name="name" type="text" placeholder="Nombre del paciente" autofocus  pattern="[\p{L}\s]+" autocomplete="off" required>
            <label for="age">Fecha de nacimiento<span>*</span> </label>
            <input id="age" name="age" type="date" placeholder="Edad del paciente" required>
            @error('age') {{$message}} @enderror
            <label for="gender">Género<span>*</span></label>
            <select name="gender" id="gender" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
        </div>
        <div>
            <label for="civil_status">Estado civil<span>*</span></label>
            <select name="civil_status" id="civil_status"  value="soltero" required>
                <option value="soltero">Soltero</option>
                <option value="casado">Casado</option>
                <option value="divorciado">Divorciado</option>
                <option value="viudo">Viudo</option>
            </select>
            <label for="scholarship">Escolaridad<span>*</span></label>
            <select name="scholarship" id="scholarship"  value="capacitacion" required>
                <option value="capacitacion">Capacitación</option>
                <option value="medio-basico">Medio básico</option>
                <option value="medio-superior">Medio superior</option>
                <option value="superior">Superior</option>
                <option value="posgrado">Posgrado</option>
                <option value="ninguna">Ninguna</option>
            </select>
            <label for="phone">Celular<span>*</span></label>
            <input id="phone" name="phone" type="text" placeholder="Número telefónico" min="1" max="120"  maxlength="10" pattern="\d{10}" autocomplete="off" required>
        </div>
        <div>
            <label for="address">Domicilio<span>*</span></label>
            <input id="address" name="address" type="text" placeholder="Domicilio del paciente"  autocomplete="off" required>
            <label for="job">Ocupación<span>*</span></label>
            <input id="job" name="job" type="text" placeholder="Ocupación del paciente" autocomplete="off" required>
            <label for="religion">Religión</label>
            <input id="religion" name="religion" type="text" placeholder="Religión del paciente" autocomplete="off">
        </div>
        <div>
            <label for="checkbox1">Motivo de la consulta</label>
            <label for="checkbox2">a) ¿Ha recibido ayuda psicológica por parte de otra situación?</label>
            <input type="checkbox" value="yes" name="checkbox" id="checkbox1"><span>Sí</span>
            <input type="checkbox" value="no" name="checkbox" id="checkbox2"><span>No</span>
            <span id="checkbox-error" style="color: red; display: none;">Selecciona al menos una opción.</span>
        </div>
        <div>
            <label for="time">¿Por cuánto tiempo?</label>
            <input id="time" name="time" type="text" placeholder="Tiempo" autocomplete="off">
            <label for="reason">Motivo de esta atención</label>
            <input id="reason" name="reason" type="text" placeholder="Motivo" autocomplete="off">
        </div>
        <div>
            <label for="description">Descripción de su situación actual</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Escriba la situación actual"></textarea>
        </div>
        <div>
            <label for="service">Asignar servicio<span>*</span></label>
            <select name="service" id="service" required>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <label for="psychologist">Asignar psicólogo<span>*</span></label>
            <select name="psychologist" id="psychologist" required>
                @foreach ($psychologists as $psychologist)
                    <option value="{{ $psychologist->id }}">{{ $psychologist->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Guardar</button>
            <button type="reset">Eliminar</button>
        </div>
    </form>
    <script src="{{ asset('js/patients_form.js') }}"></script>
@endsection