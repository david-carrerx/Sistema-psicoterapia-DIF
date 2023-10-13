<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist;
use Carbon\Carbon;

class PsychologistsController extends Controller
{
    //Función que retorna la información de los psicólogos.
    public function getPsychologistsData()
    {
        $psychologists = Psychologist::all();
        return view('psychologists', ['psychologists' => $psychologists]);
    }

    //Función que realiza la búsqueda de los psicólogos.
    public function searchPsychologists(Request $request)
    {
        $id = $request->input('id');
        $name =$request->input('name');
        
        $psychologists = Psychologist::query();

        if($id){
            $psychologists->where('id', $id);
        }
        if($name){
            $psychologists->where('name', 'LIKE', '%' . $name . '%');
        }

        $psychologists = $psychologists->get();
        return view('psychologists', compact('psychologists'));
    }
}
