<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaReservada extends Model
{
    protected $table = 'citas_reservadas';

    protected $primaryKey = 'id';

    protected $fillable = ['paciente_id', 'cita_id', 'pagada', 'atendida', 'descripcion', 'created_at', 'updated_at'];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
