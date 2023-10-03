<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
Use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\Auth\RegisteredUserController;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProfilePictureController;
Use App\Http\Request\LoginRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

//Rutas para las secciones del dashboard
Route::post('/upload-profile-picture', [ProfilePictureController::class, 'upload'])->name('upload.profile.picture');
Route::get('/perfil', [UserController::class, 'getUserData'])->name('perfil');
Route::view('/psicólogos', 'psychologists')->name('psicólogos');
Route::view('/pacientes', 'patients')->name('pacientes');
Route::view('/pagos', 'payments')->name('pagos');
Route::view('/servicios', 'services')->name('servicios');


