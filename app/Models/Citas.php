<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $table = "citas";

    protected $fillable = [
        'doctor_id', 'paciente_id', 'FyHinicio', 'FyHfinal'
    ];

    public $timestamps = false;

    public function obtPaciente(){
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }

    public function obtDoctor(){
        return $this->belongsTo(Doctores::class, 'doctor_id');
    }

    public function obtConsultorio($doctor_id){
        $doctor = Doctores::find($doctor_id);

        return Consultorios::find($doctor->id_consultorio);
    }
}
