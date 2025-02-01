<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cidade';

    protected $fillable = [
        'nome',
        'estado'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
