<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctores';
    protected $fillable = ['nombre','identificacion','especialidad','telefono','correo'];

    public function citas() {
        return $this -> hasMany(Cita::class, 'doctor_id');
    }
}
