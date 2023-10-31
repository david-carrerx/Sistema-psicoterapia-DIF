<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist;
use App\Models\Patient;
use App\Models\Service;

class PatientController extends Controller
{
    // Función para retornar la información de psicólogos y servicios.
    public function returnData()
    {
        $psychologists = Psychologist::all();
        $services = Service::all();
        return view('add-patient', compact('psychologists', 'services'));
    }

    // Función para guardar la información del paciente.
    public function saveData(Request $request)
    {
        $psychologists = Psychologist::all();
        $patients = Patient::all();

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

        return redirect()->route('pacientes');
    }

    // Función que retorna la información de los psicólogos y pacientes.
    public function getPsychologistsPatientData()
    {
        $psychologists = Psychologist::all();
        $patients = Patient::all();
        return view('patients', ['psychologists' => $psychologists, 'patients' => $patients]);
    }

    // Función para buscar pacientes.
    public function searchPatients(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $psychologistId = $request->input('psychologist');

        $patients = Patient::query();

        if ($id) {
            $patients->where('id', $id);
        }
        if ($name) {
            $patients->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($psychologistId) {
            $patients->where('psychologist_id', $psychologistId);
        }

        $patients = $patients->get();
        $psychologists = Psychologist::all();
        return view('patients', compact('patients', 'psychologists'));
    }
}