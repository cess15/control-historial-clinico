<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    public $table = "consultas";

    protected $primaryKey = "id";

    protected $fillable = ['historia_clinica_id', 'medico_id', 'diagnostico', 'recomendacion', 'observacion', 'created_at', 'updated_at'];

    public function historial()
    {
        return $this->belongsTo(Historial::class, 'historia_clinica_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function receta()
    {
        return $this->hasOne(Receta::class, 'consulta_id');
    }
}
