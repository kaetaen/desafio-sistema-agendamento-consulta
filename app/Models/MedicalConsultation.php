<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalConsultation extends Model
{
    use SoftDeletes;

    protected $table = 'consulta';

    protected $fillable = [
        'medico_id',
        'paciente_id',
        'data'
    ];

    public function medico()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Patient::class);
    }

}
