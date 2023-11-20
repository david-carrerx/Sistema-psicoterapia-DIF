@extends('layouts.app')

@section('title', 'Pacientes')
@section('content')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
<div class="main-content">
    <!--Formulario para registro de pacientes.-->
    <form id="patient-form" method="POST" action="/agregar-pacientes" class="container formulario">
        @csrf
        <div class="row">
            <div class="col-12 nav_registro_paciente">
                <h1>Registro de paciente</h1>
            </div>
        </div>
        
        <div class="form-container">
            <div class="row" name="row_form">
                <div class="col-5"><label for="name">Nombre completo<span>*</span></label>
                    <br><input class="patient_name" id="name" name="name" type="text" placeholder=" Nombre del paciente" autofocus pattern="[\p{L}\s]+" autocomplete="off" required>
                </div>
                <div class="col-4"><label for="age">Fecha de nacimiento<span>*</span></label><br>
                    <input id="age" name="age" type="date" placeholder="Edad del paciente" required>
                    @error('age') {{$message}} @enderror
                </div>
                <div class="col-3"><label for="gender">Género<span>*</span></label><br>
                    <select name="gender" id="gender" required>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="row" name="row_form">
                <div class="col-5"><label for="civil_status">Estado civil<span>*</span></label><br>
                    <select name="civil_status" id="civil_status" value="soltero" required>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>
                <div class="col-4"><label for="scholarship">Escolaridad<span>*</span></label><br>
                    <select name="scholarship" id="scholarship" value="capacitacion" required>
                        <option value="capacitacion">Capacitación</option>
                        <option value="medio-basico">Medio básico</option>
                        <option value="medio-superior">Medio superior</option>
                        <option value="superior">Superior</option>
                        <option value="posgrado">Posgrado</option>
                        <option value="ninguna">Ninguna</option>
                    </select>
                </div>
                <div class="col-3"><label for="phone">Celular<span>*</span></label><br>
                    <input id="phone" name="phone" type="text" placeholder="Número telefónico" min="1" max="120" maxlength="10" pattern="\d{10}" autocomplete="off" required>
                </div>
            </div>
            
            <div class="row" name="row_form">
                <div class="col-5"><label for="address">Domicilio<span>*</span></label><br>
                    <input id="address" name="address" type="text" placeholder="Domicilio del paciente" autocomplete="off" required>
                </div>
                <div class="col-4"><label for="religion">Religión<span class="asterisk">*</span></label><br>
                    <input id="religion" name="religion" type="text" placeholder="Religión del paciente" autocomplete="off" >
                </div>
                <div class="col-3"><label for="job">Ocupación<span>*</span></label><br>
                    <input id="job" name="job" type="text" placeholder="Ocupación del paciente" autocomplete="off" required>
                </div>
            </div>

            <div class="row" name="row_form">
                <div class="col-9">
                    <label for="checkbox1">Motivo de la consulta</label><br>
                    <label for="checkbox2" name="consulta">a) ¿Ha recibido ayuda psicológica por parte de otra situación?</label><br>
                    <input type="checkbox" value="yes" name="checkbox" id="checkbox1"><span class="no-span">Sí</span>
                    <input type="checkbox" value="no" name="checkbox" id="checkbox2"><span class="no-span">No</span>
                    <span id="checkbox-error" style="color: red; display: none;">Selecciona al menos una opción.</span>
                </div>
            </div>

            <div class="row" name="row_form">
                <div class="col-6"><label for="time">¿Por cuánto tiempo?</label><br>
                    <input id="time" name="time" type="text" placeholder="Tiempo" autocomplete="off">
                </div>
                <div class="col-6"><label for="reason">Motivo de esta atención</label><br>
                    <input id="reason" name="reason" type="text" placeholder="Motivo" autocomplete="off">
                </div>
            </div>

            <div name="row_form">
                <div class="col-13"><label for="description">Descripción de su situación actual</label><br>
                    <textarea name="description" id="description" placeholder="Escriba la situación actual"></textarea>
                </div>
            </div>
        
            <div class="row" name="row_form">
                <div class="col-4">
                    <label for="service">Asignar servicio<span>*</span></label><br>
                    <select name="service" id="service" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="psychologist">Asignar psicólogo<span>*</span></label><br>
                    <select name="psychologist" id="psychologist" required>
                        @foreach ($psychologists as $psychologist)
                            <option value="{{ $psychologist->id }}">{{ $psychologist->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="row" name="row_form">
                <div class="col-12 d-flex justify-content-end" >
                    <button type="submit" class="button-save" name="button-save">Guardar</button>
                    <button type="reset" class="button-reset" name="button-reset">Eliminar</button>
                </div>
            </div>
        </div>
    
    </form>
        
</div>    
<script src="{{ asset('js/patients_form.js') }}"></script>
@endsection