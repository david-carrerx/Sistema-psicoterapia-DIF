<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    //Función para obtener los datos del usuario.
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

    //Función para ver a los usuarios.
    public function getUsers()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    // Función para buscar Usuarios.
    public function searchUsers(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('user');
        $email = $request->input('email');

        $users = User::query();

        if ($id) {
            $users->where('id', $id);
        }
        if ($name) {
            $users->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email) {
            $users->where('email', 'LIKE', '%' . $email . '%');
        }

        $users = $users->get();
        
        return view('users', compact('users'));
    }

    //Función para ver la información del usuario seleccionado.
    public function viewUser($id)
    {
        $users = User::find($id);
        $editing = false;

        return view('user-file', compact('users', 'editing'));
    }

    //Función para editar la información del usuario.
    public function updateUser(Request $request, $id)
    {
        $users = User::find($id);
        
        if ($users)
        {
            $users->name = $request->input('name');
            $users->birthday = $request->input('birthday');
            $users->email = $request->input('email');
            $users->phone = $request->input('phone');
            $users->role = $request->input('role');

            $users->save();

            return view('user-file', compact('users'))->with('message', 'Usuario editado correctamente');
        }
        else
        {
            return view('user-file', ['id' => $id]);
        }
    }
}

