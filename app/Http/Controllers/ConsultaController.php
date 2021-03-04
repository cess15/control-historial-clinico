<?php

namespace App\Http\Controllers;

use App\CitaReservada;
use App\Consulta;
use App\Especialidad;
use App\Paciente;
use App\Traits\SplitNamesAndLastNames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    use SplitNamesAndLastNames;

    public function create($citaReservada_id)
    {
        $citaReservada = CitaReservada::findOrFail($citaReservada_id);
        $paciente = Paciente::where('id', $citaReservada->paciente->id)->has('historial')->first();
        return view('consultas.create', compact('paciente','citaReservada'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request, Consulta $consulta, $citaReservada_id)
    {
        $validate = Validator::make($request->all(), [
            'diagnostico' => ['required'],
            'recomendacion' => ['required'],
            'observacion' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $citaReservada = CitaReservada::findOrFail($citaReservada_id);
        $paciente = Paciente::where('id', $citaReservada->paciente->id)->has('historial')->first();
        
        $consulta->historia_clinica_id = $paciente->historial->id;
        $consulta->medico_id = $paciente->citaReservada->cita->medico->id;
        $consulta->diagnostico = $request->diagnostico;
        $consulta->recomendacion = $request->recomendacion;
        $consulta->observacion = $request->observacion;

        $citaReservada->atendida = true;
        $citaReservada->save();
        $consulta->save();

        return redirect()->route('recetas.create',$consulta->id);
    }
}
