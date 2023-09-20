<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class RegisteredUserController extends controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email','max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:255', Rules\Password::defaults()],
            'birthday' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'max::10']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'birthday' => $request->birthday,
            'phone' => $request->phone,
        ]);

        return redirect()->route('login')->with('status', 'Cuenta creada correctamente');
    }
}
