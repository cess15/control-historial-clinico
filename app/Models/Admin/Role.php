<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $primaryKey='id';

    protected $fillable=['nombre'];

    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }

    
}
