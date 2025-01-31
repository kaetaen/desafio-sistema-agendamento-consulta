<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cidade';

    protected $fillable = [
        'name',
        'estado',
        'created_at',
        'updated_at'
    ];
}
