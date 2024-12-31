<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nombre','identificacion','telefono','email'];

    public function citas(){
        return $this->hasMany(Cita::class, 'paciente_id');
    }
}
