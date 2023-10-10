<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function getUserData()
    {
        //Se obtiene el usuario autenticado.
        $user = auth()->user();

        // Se verifica si el usuario está autenticado.
        if ($user)
        {
            $userName = $user->name;
            $email = $user->email;
            $phone =$user->phone;
            $birthday = Carbon::parse($user->birthday);
            $age = $birthday->age;
            $role = $user->role;
        }

        //Retorna la vista perfil y la información de usuario.
        return view('profile', ['userName' => $userName, 'email' => $email, 'phone' => $phone, 'age' => $age, 'role' => $role]);
    }
}

