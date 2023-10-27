<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist;
use App\Models\Patient;
use App\Models\Service;

class PatientController extends Controller
{
    //Función para retornar la información de psicólogos y servicios.
    public function returnData()
    {
        $psychologists = Psychologist::all();
        $services = Service::all();
        return view('add-patient', compact('psychologists', 'services'));
    }
}
