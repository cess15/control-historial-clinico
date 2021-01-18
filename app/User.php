<?php

namespace App;

use App\Models\Admin\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'usuario', 'email',
        'password', 'telefono', 'imagen_perfil', 'url_imagen_perfil', 'genero', 'confirmed', 'confirmation_code', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/


    public function rol()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
