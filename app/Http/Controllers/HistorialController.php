<?php

namespace App\Http\Controllers;

use App\CitaReservada;
use App\Historial;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    public function store(Request $request, Historial $historial, $paciente_id)
    {
        $validate = Validator::make($request->all(), [
            'operado' => 'required',
            'enfermedad' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $paciente = Paciente::findOrFail($paciente_id);
        $historial->paciente_id = $paciente->id;
        $historial->operado = $request->operado;
        $historial->enfermedad_cardiaca = $request->enfermedad;
        $historial->descripcion = $request->descripcion;
        $historial->save();
        return redirect()->route('consultas.create',$paciente->citaReservada->id)->with('msg', 'Por favor, atienda la consulta con normalidad');;
    }
}
