<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medico;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function medico()
    {
        return $this->hasOne(Medico::class, 'especialidad_id');
    }
}
