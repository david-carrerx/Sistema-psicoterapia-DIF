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

    <!-- Formulario para ver y editar pacientes. -->
    <form id="patient-form" method="POST" action="{{ route('actualizar-expediente' , ['id' => $patients->id]) }}" class="container formulario">
        @csrf

        <!--Encabezado-->
        <div class="row">
            <div class="col-12 nav_registro_paciente">
                <h1>Editar paciente</h1>
            </div>
        </div>

        <div class="form-container">
            <!--Nombre completo, fecha de nacimiento y género-->
            <div class="row" name="row_form">
                <div class="col-5"><label for="name">Nombre completo<span>*</span></label>
                    <br><input type="text" name="name" value="{{ $patients->name }}" pattern="[A-Za-z\s]+" disabled autocomplete="off">
                </div>
                <div class="col-4"><label for="age">Fecha de nacimiento<span>*</span></label><br>
                    <input type="date" name="age" value="{{ $patients->age }}" disabled>
                </div>
                <div class="col-3"><label for="gender">Género<span>*</span></label><br>
                    <select name="gender" id="gender" disabled>
                        <option value="masculino" {{ $patients->gender === 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ $patients->gender === 'femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
            </div>
            <!--Estado civil, escolaridad y celular-->
            <div class="row" name="row_form">
                <div class="col-5"><label for="civil_status">Estado civil<span>*</span></label><br>
                    <select name="civil_status" id="civil_status" disabled>
                        <option value="soltero" {{ $patients->civil_status === 'soltero' ? 'selected' : '' }}>Soltero</option>
                        <option value="casado" {{ $patients->civil_status === 'casado' ? 'selected' : '' }}>Casado</option>
                        <option value="divorciado" {{ $patients->civil_status === 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                        <option value="viudo" {{ $patients->civil_status === 'viudo' ? 'selected' : '' }}>Viudo</option>
                    </select>
                </div>
                <div class="col-4"><label for="scholarship">Escolaridad<span>*</span></label><br>
                    <select name="scholarship" id="scholarship" disabled>
                        <option value="capacitacion" {{ $patients->scholarship === 'capacitacion' ? 'selected' : '' }}>Capacitación</option>
                        <option value="medio-basico" {{ $patients->scholarship === 'medio-basico' ? 'selected' : '' }}>Medio básico</option>
                        <option value="medio-superior" {{ $patients->scholarship === 'medio-superior' ? 'selected' : '' }}>Medio superior</option>
                        <option value="superior" {{ $patients->scholarship === 'superior' ? 'selected' : '' }}>Superior</option>
                        <option value="posgrado" {{ $patients->scholarship === 'posgrado' ? 'selected' : '' }}>Posgrado</option>
                        <option value="ninguna" {{ $patients->scholarship === 'ninguna' ? 'selected' : '' }}>Ninguna</option>
                    </select>
                </div>
                <div class="col-3"><label for="phone">Celular<span>*</span></label><br>
                    <input type="text" name="phone" value="{{ $patients->phone }}" min="1" max="120" required maxlength="10" pattern="\d{10}" disabled autocomplete="off">
                </div>
            </div>
            <!--Domicilio, ocupación y religión-->
            <div class="row" name="row_form">
                <div class="col-5"><label for="address">Domicilio<span>*</span></label><br>
                    <input type="text" name="address" value="{{ $patients->address }}" disabled autocomplete="off">
                </div>
                <div class="col-4"><label for="religion">Religión<span class="asterisk">*</span></label><br>
                    <input type="text" name="religion" value="{{ $patients->religion }}" disabled autocomplete="off">
                </div>
                <div class="col-3"><label for="job">Ocupación<span>*</span></label><br>
                    <input type="text" name="job" value="{{ $patients->job }}" disabled autocomplete="off">
                </div>
            </div>
            <!--Motivo de consulta-->
            <div class="row" name="row_form">
                <div class="col-9">
                    <label for="checkbox1">Motivo de la consulta</label><br>
                    <label for="checkbox2" name="consulta">a) ¿Ha recibido ayuda psicológica por parte de otra situación?</label>
                    @if ($patients->checkbox == null)
                        <input type="text" name="checkbox" value="No" disabled readonly>
                    @elseif ($patients->checkbox == 'yes')
                        <input type="text" name="checkbox" value="Si" disabled readonly>
                    @else
                        <input type="text" name="checkbox" value="No" disabled readonly>
                    @endif
                </div>
            </div>
            <!--Tiempo y motivo-->
            <div class="row" name="row_form">
                <div class="col-6"><label for="time">¿Por cuánto tiempo?</label><br>
                    <input type="text" name="time" value="{{ $patients->time }}" disabled autocomplete="off">
                </div>
                <div class="col-6"><label for="reason">Motivo de esta atención</label><br>
                    <input type="text" name="reason" value="{{ $patients->reason }}" disabled autocomplete="off">
                </div>
            </div>
            <!--Descripción-->
            <div name="row_form">
                <div class="col-13"><label for="description">Descripción de su situación actual</label><br>
                    <input type="text" name="description" value="{{ $patients->description }}" disabled autocomplete="off">
                </div>
            </div>
            <!--Psicólogo y servicio-->
            <div class="row" name="row_form">
                <div class="col-4">
                    <label for="service">Servicio<span>*</span></label><br>
                    <input type="text" name="service" value="{{ $patients->service->name }}" disabled readonly>
                </div>
                <div class="col-4">
                    <label for="psychologist">Psicólogo<span>*</span></label><br>
                    <input type="text" name="psychologist" value="{{ $patients->psychologist->name }}" disabled readonly>
                </div>
            </div>
            <!--Botones-->
            <div class="row" name="row_form">
                <div class="col-12 d-flex justify-content-end">
                    <button type="button" id="edit" class="button-edit" name="button-edit">Editar</button>
                    <button type="submit" id="save" class="button-save" name="button-save"  style="display: none;">Guardar</button>
                    <button type="button" id="cancel" style="display: none;" class="button-cancel" name="button-cancel">Cancelar</button>
                </div>
            </div>
            
        </div>    
    </form>
</div>
<script src="{{ asset('js/patients_form.js') }}"></script>
@endsection