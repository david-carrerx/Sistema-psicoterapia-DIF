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
Use App\Http\Controllers\PaymentController;
Use App\Http\Request\LoginRequest;

//Rutas para navegar entre diferentes vistas.
//Route::view('/','welcome');
Route::view('/', 'auth.login');
Route::view('login','auth.login')->name('login')->middleware('guest');
Route::view('home','home')->name('home')->middleware('auth');

//Rutas para el login y el logout.
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

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
Route::get('/ver-expediente/{id}', [PatientController::class, 'viewFile'])->name('ver-expediente');
Route::post('/actualizar-expediente/{id}', [PatientController::class, 'updateFile'])->name('actualizar-expediente');

//Rutas para el manejo de usuarios
Route::get('/usuarios', [UserController::class, 'getUsers'])->name('usuarios');
Route::match(['get', 'post'], '/buscar-usuarios', [UserController::class, 'searchUsers'])->name('buscar-usuarios');
Route::view('/registro', 'auth.register')->name('registrar');
Route::post('/registro', [RegisteredUserController::class, 'store']);
Route::get('/ver-usuario/{id}', [UserController::class, 'viewUser'])->name('ver-usuario');
Route::post('/actualizar-usuario/{id}', [UserController::class, 'updateUser'])->name('actualizar-usuario');

//Rutas para el manejo de información de los pagos.
Route::get('/pagos', [PaymentController::class, 'getInfo'])->name('pagos');
Route::match(['get', 'post'], '/buscar-pagos', [PaymentController::class, 'searchPayments'])->name('buscar-pagos');
Route::get('/agregar-pago', [PaymentController::class, 'returnData'])->name('agregar-pago');
Route::post('/agregar-pago', [PaymentController::class, 'saveData'])->name('agregar-pago');
Route::post('/guardar-datos', [PaymentController::class, 'savePayment'])->name('guardar-datos');
Route::get('eliminar-pago/{id}', [PaymentController::class, 'deletePayment'])->name('eliminar-pago');