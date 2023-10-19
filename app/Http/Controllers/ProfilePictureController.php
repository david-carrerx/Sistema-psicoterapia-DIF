<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePictureController extends Controller
{
    public function upload(Request $request)
    {
        //Validación de la imagen.
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Subir la imagen al sistema de archivos.
        if ($request->hasFile('profile_picture')){
            $imagen = $request->file('profile_picture');
            $nombreImagen = uniqid('profile_') . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/profile_pictures', $nombreImagen);
        }

        //Actualizar el campo "profile_picture" en la base de datos.
        if ($request->user()){
            $request->user()->update(['profile_picture' => $nombreImagen]);
        }

        //Regresar el mensaje de éxito.
        return redirect()->back()->with('success', 'Foto de perfil actualizada con éxito.');
    }
}