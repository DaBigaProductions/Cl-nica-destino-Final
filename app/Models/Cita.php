<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora','doctor_id','paciente_id','diagnostico','tratamiento'];

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function paciente() {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
