<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Psychologist;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    // Función para retornar la información de psicólogos y servicios.
    public function returnData()
    {
        $psychologists = Psychologist::all();
        $services = Service::all();
        $patients = Patient::all();
        return view('add-payment', compact('psychologists', 'services', 'patients'));
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
        
        $payment->user_id = $request->input('user');
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
        $date2 = $request->input('date2');
        $patientName = $request->input('patient-name');
        $cashier = $request->input('cashier');

        $payments = Payment::query();
        $patients = Patient::all();
        $services = Service::all();


        // Validación de fechas
        $request->validate([
            'date' => 'nullable|date',
            'date2' => 'nullable|date|after_or_equal:date',
        ]);

        if ($serviceId) {
            $payments->where('service_id', $serviceId);
        }
        
        if ($patientName) {
            $patientId = Patient::where('name', $patientName)->value('id');
    
            if ($patientId) {
                $payments->where('patient_id', $patientId);
            }
            else {
                //
            }
        }

        if ($date && $date2) {
            $payments->whereBetween('date', [$date, $date2]);
        }

        if ($cashier) {
            $userId = User::where('name', $cashier)->value('id');
    
            if ($userId) {
                $payments->where('user_id', $userId);
            }
            else {
                //
            }
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

    //Función para guardar la información de los pagos.
    public function savePayment(Request $request)
    {
        $payments = Payment::all();
        $services = Service::all();
        $patients = Patient::all();

        $payment = new Payment();
        $payment->patient_id = $request->input('patient-name');
        $payment->price = $request->input('total-amount');
        $payment->service_id = $request->input('service-id');
        $payment->user_id = Auth::user()->id; 
        $payment->date = now();

        $payment->save();
        
       return redirect()->route('pagos');
    }

    //Función para deshabilitar pagos.
    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        $payment->status = "Inactivo";
        $payment->save();


        return redirect()->route('pagos');
    }
}
