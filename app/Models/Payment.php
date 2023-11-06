<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    //Relación a un paciente.
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    //Relación a un servicio.
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
