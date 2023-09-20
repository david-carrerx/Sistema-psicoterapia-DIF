<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
Use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\Auth\RegisteredUserController;
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
Route::view('/', 'login');
Route::view('login','login')->name('login')->middleware('guest');
Route::view('dashboard','dashboard')->middleware('auth');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);