<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    // Campos que se pueden llenar de forma masiva.
    protected $fillable = [
        'id', 'patient_id', 'price', 'date', 'service_id',
        'user_id', 'status'
    ];

    //Relación a un paciente.
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    //Relación a un servicio.
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    //Relación a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
