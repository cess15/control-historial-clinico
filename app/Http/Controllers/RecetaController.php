<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\DetalleReceta;
use App\Especialidad;
use App\Mail\RecetaMail;
use App\Medico;
use App\Notifications\RecetaEmailNotification;
use App\Receta;
use App\Traits\SplitNamesAndLastNames;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RecetaController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        $especialidades = Especialidad::orderBy('name', 'ASC')->get();
        return view('recetas.index', compact('especialidades'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function showViewEspecialidad($especialidad_id)
    {
        $medicos = Medico::where('especialidad_id', $especialidad_id)->has('consulta')->paginate(5);
        return view('recetas.medico', compact('medicos'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function getMedico($medico_id)
    {
        $medico = Medico::findOrFail($medico_id);
        $consultas = Consulta::where('medico_id', $medico_id)->has('receta')->orderBy('created_at', 'ASC')->paginate(6);
        return view('recetas.consultas', compact('consultas', 'medico'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function getConsulta($consulta_id)
    {
        $receta = Receta::where('consulta_id', $consulta_id)->first();
        return view('recetas.showReceta', compact('receta'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function generate($receta_id)
    {
        $receta = Receta::findOrFail($receta_id);
        $pdf = App::make('dompdf.wrapper');
        return $pdf->loadView('reportes.receta', compact('receta'))->setPaper('a4', 'landscape')->stream();
    }

    public function create($consulta_id)
    {
        $consulta = Consulta::findOrFail($consulta_id);
        return view('recetas.create', compact('consulta'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request, $consulta_id)
    {
        $consulta = Consulta::findOrFail($consulta_id);
        if ($consulta != null) {
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
            $this->enviarCorreo($receta->id);
        }
        return redirect()->route('recetas.show', $receta->id);
    }

    public function show($receta_id)
    {
        $receta = Receta::findOrFail($receta_id);
        return view('recetas.showRecetaForMedic', compact('receta'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function enviarCorreo($recetaId)
    {
        $receta = Receta::findOrFail($recetaId);
        $pdf = App::make('dompdf.wrapper');
        $output = $pdf->loadView('reportes.receta', compact('receta'))->output();
        Mail::to($receta->consulta->historial->paciente->user->email)
            ->send(new RecetaMail($receta, $output));
    }
}
