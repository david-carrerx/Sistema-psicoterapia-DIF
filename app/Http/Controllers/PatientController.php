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
        $patient->gender = $request->input('gender');
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
        $psychologists = Psychologist::all();

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
        
        return view('patients', compact('patients', 'psychologists'));
    }

    //Función para ver el expediente del paciente.
    public function viewFile($id)
    {
        $patients = Patient::find($id);
        $editing = false;

        return view('patient-file', compact('patients', 'editing'));
    }

    //Función para editar el expediente del paciente.
    public function updateFile(Request $request, $id)
    {
        $patients = Patient::find($id);
        
        if ($patients)
        {
            $patients->name = $request->input('name');
            $patients->age = $request->input('age');
            $patients->gender = $request->input('gender');
            $patients->civil_status = $request->input('civil_status');
            $patients->scholarship = $request->input('scholarship');
            $patients->phone = $request->input('phone');
            $patients->address = $request->input('address');
            $patients->job = $request->input('job');
            $patients->religion = $request->input('religion');
            $patients->time = $request->input('time');
            $patients->reason = $request->input('reason');
            $patients->description = $request->input('description');

            $patients->save();

            return view('patient-file', compact('patients'))->with('message', 'Paciente editado correctamente');
        }
        else
        {
            return view('patient-file', ['id' => $id]);
        }
    }
}

