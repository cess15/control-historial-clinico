<?php

namespace App\Http\Controllers;

use App\CitaReservada;
use App\Consulta;
use App\DetalleReceta;
use App\Paciente;
use App\Receta;
use App\Traits\SplitNamesAndLastNames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    use SplitNamesAndLastNames;

    public function showViewCajero()
    {
        $consultas=Consulta::has('receta')->get();
        return view('consultas.cajero.index', compact('consultas'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function create($id)
    {
        $citaReservada = CitaReservada::findOrFail($id);
        $paciente = Paciente::where('id', $citaReservada->paciente->id)->has('historial')->first();
        return view('consultas.create', compact('citaReservada', 'paciente'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request, Consulta $consulta, $paciente_id)
    {
        $paciente = Paciente::findOrFail($paciente_id);
        $consulta->historia_clinica_id = $paciente->historial->id;
        $consulta->medico_id = $paciente->citaReservada->cita->medico->id;
        $consulta->diagnostico = $request->diagnostico;
        $consulta->recomendacion = $request->recomendacion;
        $consulta->observacion = $request->observacion;
        $consulta->save();

        CitaReservada::where('id', $paciente->citaReservada->id)->update(['atendida' => true]);
        $receta = new Receta();
        $receta->consulta_id = $consulta->id;
        $receta->fecha_expedicion = $consulta->created_at;
        $receta->save();

        $detalleReceta = new DetalleReceta();
        $detalleReceta->receta_id = $receta->id;
        $detalleReceta->prescripcion = $request->prescripcion;
        $detalleReceta->dosis = $request->dosis;
        $detalleReceta->horario = $request->horario;
        $detalleReceta->save();
        return redirect()->route('inicio');
    }

    

    public function obtenerConsultasCajero()
    {
        $consultas=Consulta::all();
    }
}
