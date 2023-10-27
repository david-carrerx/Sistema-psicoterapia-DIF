<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';

    // Campos que se pueden llenar de forma masiva.
    protected $fillable = [
        'name', 'age', 'genre', 'civil_status', 'scholarship',
        'phone', 'checkbox' ,'address', 'job', 'religion', 'time', 'reason',
        'description', 'service_id', 'psychologist_id',
    ];

    //Relación a un psicólogo.
    public function psychologist()
    {
        return $this->belongsTo(Psychologist::class);
    }

    //Relación a un servicio.
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
