<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
Use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\Auth\RegisteredUserController;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProfilePictureController;
Use App\Http\Controllers\ServicesController;
Use App\Http\Controllers\PsychologistsController;
Use App\Http\Controllers\PatientController;
Use App\Http\Request\LoginRequest;

//Rutas para navegar entre diferentes vistas.
//Route::view('/','welcome');
Route::view('/', 'auth.login');
Route::view('login','auth.login')->name('login')->middleware('guest');
Route::view('home','home')->name('home')->middleware('auth');

//Rutas para el login y el logout.
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

//Rutas para el registro de usuarios.
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//Rutas para el manejo de la información del perfil de usuario.
Route::post('/upload-profile-picture', [ProfilePictureController::class, 'upload'])->name('upload.profile.picture');
Route::get('/perfil', [UserController::class, 'getUserData'])->name('perfil');

//Ruta para el manejo de la información de los servicios.
Route::get('/servicios', [ServicesController::class, 'index'])->name('servicios');

//Ruta para el manejo de la información de los psicólogos.
Route::get('/psicólogos', [PsychologistsController::class, 'getPsychologistsData'])->name('psicólogos');
Route::match(['get', 'post'], '/buscar-psicólogos', [PsychologistsController::class, 'searchPsychologists'])->name('buscar-psicólogos');
Route::get('/perfil-psicólogo/{id}', [PsychologistsController::class, 'createProfile'])->name('perfil-psicólogo');

//Rutas para el manejo de la información de los pacientes.
Route::get('/pacientes', [PatientController::class, 'getPsychologistsPatientData'])->name('pacientes');
Route::match(['get', 'post'], '/buscar-pacientes', [PatientController::class, 'searchPatients'])->name('buscar-pacientes');
Route::get('/agregar-pacientes', [PatientController::class, 'returnData'])->name('agregar-pacientes');
Route::post('/agregar-pacientes', [PatientController::class, 'saveData'])->name('agregar-pacientes');


Route::view('/pagos', 'payments')->name('pagos');
