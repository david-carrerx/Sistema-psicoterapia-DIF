<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychologist extends Model
{
    use HasFactory;
    
    // Campos que se pueden llenar de forma masiva.
    protected $fillable = ['name', 'description', 'speciality', 'birthday', 'phone', 'email', 'profile_image'];
    
    //Relación a muchos pacientes.
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
