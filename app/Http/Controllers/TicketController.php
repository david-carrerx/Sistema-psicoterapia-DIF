<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use PDF;

class TicketController extends Controller
{
    public function createTicket($id)
    {
        $payment = Payment::find($id);

        $data = ['payment' => $payment];

        $pdf = PDF::loadView('ticket', $data);
        $filename = 'ticket_' . $id . '.pdf';

        return $pdf->download($filename);

        return view('ticket', ['payment' => $payment]);
    }
}
