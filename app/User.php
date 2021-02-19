<?php

namespace App;

use App\Models\Admin\Role;
use App\Notifications\CustomEmailNotification;
use App\Notifications\Email;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Medico;
use App\Notifications\MedicoEmailNotification;

class User extends Authenticatable implements MustVerifyEmail
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
        'password', 'telefono', 'imagen_perfil', 'url_imagen_perfil', 'genero', 'created_at', 'updated_at'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createUserName()
    {
        $nick = Str::substr($this->attributes['nombres'], 2, 6);
        $lastNick = Str::substr($this->attributes['cedula'], 5, 9);
        $fullNick = $nick . '' . $lastNick;
        return Str::replaceFirst(' ', '', $fullNick);
    }


    public function rol()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function medico()
    {
        return $this->hasOne(Medico::class, 'usuario_id');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'usuario_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Email($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomEmailNotification);
    }
}
