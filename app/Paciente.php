<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id', 'tipo_sangre', 'discapacidad', 'fecha_nacimiento', 'ocupacion',
        'direccion', 'ciudad', 'estado_civil'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function citaReservada()
    {
        return $this->hasOne(CitaReservada::class, 'paciente_id');
    }
}
