<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    public $table = "detalle_recetas";

    protected $primaryKey = "id";

    protected $fillable = ["receta_id", "prescripcion", "dosis", "horario"];

    public $timestamps = false;

    public function receta()
    {
        return $this->belongsTo(Receta::class, "receta_id");
    }
}
