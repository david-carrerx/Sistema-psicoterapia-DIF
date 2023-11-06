<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Payment;


class PaymentController extends Controller
{
    // Función para retornar la información de psicólogos y servicios.
    public function returnData()
    {
        $psychologists = Psychologist::all();
        $services = Service::all();
        return view('add-payment', compact('psychologists', 'services'));
    }

    // Función para guardar la información del paciente.
    public function saveData(Request $request)
    {
        $psychologists = Psychologist::all();
        $patients = Patient::all();
        $services = Service::all();

        $payment = new Payment;
        $payment->name = $request->input('name');
        $payment->age = $request->input('age');
        $payment->price = $request->input('price');
        
        $payment->service_id = $request->input('service');
        $payment->psychologist_id = $request->input('psychologist');

        $payment->save();

        return redirect()->route('payment');
    }

    // Función para buscar pagos.
    public function searchPayments(Request $request)
    {
        $serviceId = $request->input('service');
        $date = $request->input('date');
        $patientId = $request->input('patient');

        $payments = Payment::query();
        $patients = Patient::all();
        $services = Service::all();

        if ($serviceId) {
            $payments->where('service_id', $serviceId);
        }
        if ($date) {
            $date = date('Y-m-d', strtotime($date));
            $payments->whereDate('date', $date);
        }
        if ($patientId) {
            $payments->where('patient_id', $patientId);
        }

        $payments = $payments->get();
        
        return view('payments', compact('payments', 'patients', 'services'));
    }

    //Función que retorna la información de los psicólogos.
    public function getInfo()
    {
        $payments = Payment::all();
        $services = Service::all();
        $patients = Patient::all();

        return view('payments', compact('services', 'patients', 'payments'));
    }
}
