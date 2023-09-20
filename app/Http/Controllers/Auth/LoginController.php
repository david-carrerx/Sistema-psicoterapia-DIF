<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Redirector;

class LoginController extends Auth
{
    //Función para obtener los datos de inicio de sesión y validar el acceso.
    public function login(Request $request, Redirector $redirect)
    {
        $remember = $request->filled('remember');
    
        if(Auth::attempt($request->only('email', 'password'), $remember))
        {
            $request->session()->regenerate();
            return $redirect->intended('dashboard')->with('status', 'Has ingresado correctamente');
        }
    
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    //Función para llamar a la salida de sesión y redireccionar a la raíz.
    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/');
    }
}