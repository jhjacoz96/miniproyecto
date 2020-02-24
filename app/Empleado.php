<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido'
    ];

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }
}
