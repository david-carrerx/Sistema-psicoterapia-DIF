<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    //Relación a muchos pacientes.
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
