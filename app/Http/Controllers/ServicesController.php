<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServicesController extends Controller
{
    //Función para obtener los registros de la tabla services.
    public function index()
    {
        $services = Service::all();
        return view('services', ['services' => $services]);
    }
}
