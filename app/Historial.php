<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    public $table = "historia_clinica";

    protected $primaryKey = "id";

    protected $fillable = ['paciente_id','descripcion','operado','enfermedad_cardiaca','created_at','updated_at'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
