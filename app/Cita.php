<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $primaryKey = 'id';

    protected $fillable = ['medico_id','dia','hora','agendada','precio','created_at','updated_at'];

    public function medico()
    {
        return $this->belongsTo(Medico::class,'medico_id');
    }

    
}
