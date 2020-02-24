<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'name'
    ];

    public function empleado()
    {
        return $this->hasMany('App\Empleado');
    }
}
