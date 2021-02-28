<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Especialidad;
use App\Exceptions\GeneralExceptionError;
use App\Medico;
use App\Traits\SplitNamesAndLastNames;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CitaController extends Controller
{
    use SplitNamesAndLastNames;

    public function getEspecialidades()
    {
        $especialidadesMedicos = Cita::join('medicos', 'medicos.id', 'citas.medico_id')->has('medico')->get();
        $especialidades = Especialidad::orderBy('name', 'ASC')->get();
        return view('citas.paciente.especialidad', compact('especialidades', 'especialidadesMedicos'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function getMedicoByEspecialidad($id)
    {
        //Obtener las citas con cupos asignados para un médico con su especialidad y que ya no este agendada
        $citas = Cita::join('medicos', 'medicos.id', 'citas.medico_id')->where('medicos.especialidad_id', $id)->where('agendada', false)->orderBy('dia', 'ASC')->has('medico')->get();
        //Obtener medico por especialidad
        $medicos = Medico::where('especialidad_id', $id)->has('cita')->paginate(5);
        return view('citas.paciente.medico', compact('medicos', 'citas'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function getCitaByMedico($id)
    {
        $medico = Medico::findOrFail($id);
        $citas = Cita::where('citas.medico_id', $medico->id)->where('agendada', false)->distinct()->get();
        return view('citas.paciente.infoCita', compact('medico', 'citas'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function create()
    {
        return view('citas.create', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('citas.edit', compact('cita'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'medico' => ['required', 'integer'],
            'dia' => ['not_in:0'],
            'hora' => ['required'],
            'precio' => ['required', 'numeric'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $cita = new Cita();
        $cita->medico_id = $request->medico;
        $cita->dia = $request->dia;
        $cita->hora = $request->hora;

        $precio = Str::replaceFirst(',', '.', $request->precio);
        $cita->precio = $precio;
        $cita->agendada = false;

        $citaDia = Cita::where('dia', $request->dia)->where('medico_id', $request->medico)->where('hora', $request->hora)->first();
        if ($citaDia != null) {
            return redirect()->back()->withInput()->withErrors('No se puede asignar un cupo al mismo dia ni a la misma hora con este médico');
        }

        $cita->save();

        return redirect()->route('citas.create')->with('msg', 'Cupo asignado correctamente');
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'medico' => ['required', 'integer'],
            'dia' => ['not_in:0'],
            'hora' => ['required'],
            'precio' => ['required', 'numeric'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $cita->medico_id = $request->medico;

        switch ($request->dia) {
            case $request->dia == 'Lunes':
                $cita->dia = $request->dia;
                break;
            case $request->dia == 'Martes':
                $cita->dia = $request->dia;
                break;
            case $request->dia == 'Miércoles':
                $cita->dia = $request->dia;
                break;
            case $request->dia == 'Jueves':
                $cita->dia = $request->dia;
                break;
            case $request->dia == 'Viernes':
                $cita->dia = $request->dia;
                break;
            default:
                throw new GeneralExceptionError('El valor del campo dia seleccionado no es el correcto');
        }
        $cita->hora = $request->hora;

        $precio = Str::replaceFirst(',', '.', $request->precio);
        $cita->precio = $precio;
        $cita->agendada = false;
        $cita->save();
        return redirect()->route('citas.edit', $cita->id)->with('msg', 'Cupo actualizado correctamente');
    }

    public function delete($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('inicio');
    }

    public function searchMedic(Request $request)
    {
        $medico = [];

        if ($request->has('q')) {
            $search = $request->q;
            $medico = Medico::join('users', 'users.id', '=', 'medicos.usuario_id')->select('medicos.id', 'users.nombres', 'users.apellidos')->where('users.nombres', 'LIKE', "%$search%")->orderBy('users.nombres', 'ASC')->get();
        }
        return response()->json($medico);
    }

    public function findAll()
    {
        $citas = Cita::orderBy('dia', 'ASC')->get();
        return DataTables::of($citas)
            ->addColumn('medico', function ($cita) {
                if ($cita->medico->user->nombres != null && $cita->medico->user->apellidos != null) {
                    return $cita->medico->user->nombres . ' ' . $cita->medico->user->apellidos;
                } else {
                    return '';
                }
            })
            ->addColumn('dia', function ($cita) {
                return $cita->dia != null ? $cita->dia : '';
            })
            ->addColumn('hora', function ($cita) {
                return $cita->hora != null ? $cita->hora : '';
            })
            ->addColumn('precio', function ($cita) {
                return $cita->precio != null ? '$ ' . $cita->precio : '';
            })
            ->addColumn('agendada', function ($cita) {
                if ($cita->agendada != false) {
                    return 'Reservada';
                } else {
                    return 'Disponible';
                }
            })
            ->addColumn('fecha_creacion', function ($cita) {
                if ($cita->created_at != null) {
                    return $this->convertDate($cita->created_at);
                } else {
                    return '';
                }
            })
            ->addColumn('botones', 'citas.actions')
            ->rawColumns(['botones'])
            ->make(true);;
    }
}
