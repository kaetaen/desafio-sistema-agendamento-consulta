<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $table = 'medico';

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'cidade_id');
    }
}