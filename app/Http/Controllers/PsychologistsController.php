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
}
