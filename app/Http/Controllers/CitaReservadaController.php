<?php

namespace App\Http\Controllers;

use App\Cita;
use App\CitaReservada;
use App\Paciente;
use App\Traits\SplitNamesAndLastNames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CitaReservadaController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        return view('citasReservadas.index', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit($id)
    {
        $citaReservada = CitaReservada::findOrFail($id);
        return view('citasReservadas.edit', compact('citaReservada'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'horario' => ['required']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        $paciente = Paciente::where('usuario_id', Auth::user()->id)->get(['id']);
        $citaReservada = new CitaReservada();
        $citaReservada->paciente_id = $paciente[0]->id;
        $citaReservada->cita_id = intval($request->horario);
        $citaReservada->descripcion = $request->descripcion;
        $citaReservada->pagada = false;
        $citaReservada->save();
        Cita::where('id', $request->horario)->update(['agendada' => true]);
        return redirect()->route('citas.reservar')->with('msg', 'Ha reservado una cita correctamente');
    }

    public function getCitaReservadaByPaciente()
    {
        $paciente = Paciente::where('usuario_id', Auth::user()->id)->first();
        $citaReservada = CitaReservada::where('paciente_id', $paciente->id)->has('paciente')->get();
        return DataTables::of($citaReservada)
            ->addColumn('medico', function ($citaReservada) {
                return $citaReservada->cita->medico->user->nombres . ' ' . $citaReservada->cita->medico->user->apellidos;
            })
            ->addColumn('fechaCita', function ($citaReservada) {
                return $this->convertDateWithoutTimeZone($citaReservada->cita->dia);
            })
            ->addColumn('hora', function ($citaReservada) {
                return $citaReservada->cita->hora;
            })
            ->addColumn('precio', function ($citaReservada) {
                return '$ ' . $citaReservada->cita->precio;
            })
            ->addColumn('estado', function ($citaReservada) {
                if ($citaReservada->pagada == false) {
                    return "Reservada";
                } else {
                    return "Cancelada";
                }
            })
            ->addColumn('fechaRegistro', function ($citaReservada) {
                return $this->convertDate($citaReservada->created_at);
            })
            ->make(true);
    }

    public function findAll()
    {
        $citaReservada = CitaReservada::where('pagada', false)->get();
        return DataTables::of($citaReservada)
            ->addColumn('medico', function ($citaReservada) {
                return $citaReservada->cita->medico->user->nombres . ' ' . $citaReservada->cita->medico->user->apellidos;
            })
            ->addColumn('paciente', function ($citaReservada) {
                return $citaReservada->paciente->user->nombres;
            })
            ->addColumn('fechaCita', function ($citaReservada) {
                return $this->convertDateWithoutTimeZone($citaReservada->cita->dia);
            })
            ->addColumn('hora', function ($citaReservada) {
                return $citaReservada->cita->hora;
            })
            ->addColumn('precio', function ($citaReservada) {
                return '$ ' . $citaReservada->cita->precio;
            })
            ->addColumn('estado', function ($citaReservada) {
                if ($citaReservada->pagada == false) {
                    return "Reservada";
                } else {
                    return "Cancelada";
                }
            })
            ->addColumn('fechaRegistro', function ($citaReservada) {
                return $this->convertDateWithoutTimeZone($citaReservada->created_at);
            })
            ->addColumn('botones', 'citasReservadas.actions')
            ->rawColumns(['botones'])
            ->make(true);
    }
}
