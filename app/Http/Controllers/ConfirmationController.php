<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function verify($code)
    {
        $user=User::where('confirmation_code',$code)->first();
        if(!$user)
        {
            return redirect('/login')->with('dangerous','Ocurrió un error, contacte a soporte');
        }
        $user->confirmed=true;
        $user->confirmation_code=null;
        $user->save();
        return redirect('/login')->with('notify','Ya se ha verificado su correo, inicie sesión');
    }
}
