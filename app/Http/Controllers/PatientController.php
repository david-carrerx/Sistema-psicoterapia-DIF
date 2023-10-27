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

    //Función para guardar la información del paciente.
    public function saveData(Request $request)
    {
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->genre = $request->input('genre');
        $patient->civil_status = $request->input('civil_status');
        $patient->scholarship = $request->input('scholarship');
        $patient->phone = $request->input('phone');
        $patient->checkbox = $request->input('checkbox');
        $patient->address = $request->input('address');
        $patient->job = $request->input('job');
        $patient->religion = $request->input('religion');
        $patient->time = $request->input('time');
        $patient->reason = $request->input('reason');
        $patient->description = $request->input('description');
        $patient->service_id = $request->input('service');
        $patient->psychologist_id = $request->input('psychologist');

        $patient->save();

        return view('patients');
    }
}