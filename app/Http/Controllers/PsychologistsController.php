<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist;
use App\Models\Service;
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

    //Función que crea el perfil de un psicólogo.
    public function createProfile($id)
    {
        $psychologists = Psychologist::find($id);

        $birthday = Carbon::parse($psychologists->birthday);
        $age = $birthday->age;

        return view('psychologist-profile', compact('psychologists', 'age'));
    }

    // Función para retornar la información de psicólogos y servicios.
    public function returnData()
    {
        $psychologists = Psychologist::all();
        $services = Service::all();
        return view('add-psychologist', compact('psychologists', 'services'));
    }

    // Función para guardar la información del paciente.
    public function saveData(Request $request)
    {
        $psychologists = Psychologist::all();

        $psychologists = new Psychologist;
        $psychologists->name = $request->input('name');
        $psychologists->description = $request->input('description');
        $psychologists->speciality = $request->input('speciality');
        $psychologists->phone = $request->input('phone');
        $psychologists->email = $request->input('email');
        $psychologists->birthday = $request->input('birthday');

        $psychologists->save();

        return redirect()->route('psicólogos');
    }
}
