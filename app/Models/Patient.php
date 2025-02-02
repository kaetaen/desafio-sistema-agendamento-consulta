<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'paciente';
    
    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];
    public function consultas()
    {
        return $this->hasMany(MedicalConsultation::class, 'paciente_id');
    }
}
