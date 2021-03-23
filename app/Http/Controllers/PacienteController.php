<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralExceptionError;
use App\Paciente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function store(Request $request, Paciente $paciente)
    {
        $validate = Validator::make($request->all(), [
            'direccion' => 'required',
            'ciudad' => 'required',
            'tipo_sangre' => ['required', 'not_in:0'],
            'estado_civil' => ['required', 'not_in:0'],
            'ocupacion' => ['required'],
            'fecha_nacimiento' => 'required',
            'discapacidad' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $paciente->usuario_id = Auth::user()->id;
        $paciente->direccion = $request->direccion;
        $paciente->ciudad = $request->ciudad;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->ocupacion = $request->ocupacion;
        if ($request->fecha_nacimiento <= date('Y')) {
            $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        } else {
            throw new GeneralExceptionError("La fecha que esta seleccionando es inválida");
        }
        if ($request->discapacidad == 1) {
            $paciente->discapacidad = $request->discapacidad;
            $paciente->tipo_discapacidad = $request->tipo_discapacidad;
            $paciente->porcentaje = intval($request->porcentaje);
        } 
        if($request->discapacidad == 0){
            $paciente->tipo_discapacidad = null;
            $paciente->porcentaje = null;
            $paciente->discapacidad = $request->discapacidad;
        }
        $paciente->save();
        $user = User::findOrFail($paciente->usuario_id);
        $user->updated = true;
        $user->save();
        return redirect()->route('perfil.edit')->with('msg', 'Datos actualizados correctamente');
    }

    public function update(Request $request, Paciente $paciente)
    {
        $validate = Validator::make($request->all(), [
            'direccion' => 'required',
            'ciudad' => 'required',
            'tipo_sangre' => ['required', 'not_in:0'],
            'estado_civil' => ['required', 'not_in:0'],
            'ocupacion' => ['required'],
            'fecha_nacimiento' => 'required',
            'discapacidad' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $paciente->direccion = $request->direccion;
        $paciente->ciudad = $request->ciudad;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->ocupacion = $request->ocupacion;
        if ($request->fecha_nacimiento <= date('Y')) {
            $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        } else {
            throw new GeneralExceptionError("La fecha que esta seleccionando es inválida o es mayor al año actual");
        }
        if ($request->discapacidad == 1) {
            $paciente->discapacidad = $request->discapacidad;
            $paciente->tipo_discapacidad = $request->tipo_discapacidad;
            $paciente->porcentaje = intval($request->porcentaje);
        } 
        if($request->discapacidad == 0){
            $paciente->tipo_discapacidad = null;
            $paciente->porcentaje = null;
            $paciente->discapacidad = $request->discapacidad;
        }
        $paciente->save();
        return redirect()->route('perfil.edit')->with('msg', 'Datos actualizados correctamente');
    }
}
