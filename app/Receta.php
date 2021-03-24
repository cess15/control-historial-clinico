<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public $table = "recetas";

    protected $primaryKey = "id";

    protected $fillable = ["consulta_id", "fecha_expedicion"];

    public $timestamps = false;

    public function detalleReceta()
    {
        return $this->hasOne(DetalleReceta::class, "receta_id");
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }

    public function convertDateWithoutTimeZone($date)
    {
        setLocale(LC_ALL, 'spanish_ecuador.utf-8');
        $myDate = str_replace("/", "-", $date);
        $newDate = date('d-m-Y H:i:s', strtotime($myDate));
        return strftime('%A, %d de %B del %Y', strtotime($newDate));
    }
}
