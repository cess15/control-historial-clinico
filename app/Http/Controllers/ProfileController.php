<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Traits\SplitNamesAndLastNames;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        return view('user.profile', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit()
    {
        $perfil = Auth::user();
        return view('user.edit', ['user' => $perfil, 'name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function update(Request $request, User $user)
    {
        $validate = Validator::make($request->all(), [
            'cedula' => ['required','ecuador:ci', 'unique:users,cedula,' . Auth::user()->id],
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'unique:users,email,' . Auth::user()->id],
            'telefono' => ['required', 'unique:users,telefono,' . Auth::user()->id],
            'genero' => 'not_in:0',
            'usuario' => ['required', 'unique:users,usuario,' . Auth::user()->id],
        ],[
            'cedula.ecuador' => 'validation.ecuador', 
            'nombres.required' => 'El valor del campo :attribute es requerido',
            'apellidos.required' => 'El valor del campo :attribute es requerido',
            'email.required' => 'El valor del campo :attribute es requerido',
            'telefono.required' => 'El valor del campo :attribute es requerido',
            'genero.not_in' => 'El valor del campo :attribute seleccionado no es el correcto',
            'usuario.required' => 'El valor del campo :attribute es requerido',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        $user->cedula = $request->cedula;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->genero = $request->genero;
        $user->usuario = $request->usuario;
        
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->updated = true;
        $user->update();
        return redirect()->route('perfil.edit')->with('msg', 'Datos guardados correctamente');
    }

    public function postCredentials(Request $request, User $user)
    {
        $validateCredentials = Validator::make($request->all(), [
            'password' => 'required',
            'newpassword' => ['required', 'string', 'min:8'],
            'repassword' => ['required', 'same:newpassword'],
        ]);

        if ($validateCredentials->fails()) {
            return redirect()->back()->withInput()->withErrors($validateCredentials->errors());
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->updated = true;
            $user->save();
        }
        return redirect()->route('perfil.edit')->with('msg', 'Datos guardados correctamente');
    }
}
