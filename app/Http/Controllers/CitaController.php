<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medico;
use App\Traits\SplitNamesAndLastNames;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CitaController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        return view('citas.index', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function create()
    {
        return view('citas.create', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit($id)
    {
        $cita=Cita::findOrFail($id);
        return view('citas.edit',compact('cita'),['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'medico' => ['required', 'integer'],
            'dia' => ['not_in:0'],
            'hora' => ['required'],
            'precio' => ['required', 'regex:/^\d{1,3}(?:\.\d\d\d)*(?:,\d{1,2})?$/'],
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
        $cita->save();
        return redirect()->route('citas.create')->with('msg', 'Cupo asignado correctamente');
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
                if($cita->medico->user->nombres!=null && $cita->medico->user->apellidos!=null){
                    return $cita->medico->user->nombres.' '.$cita->medico->user->apellidos;
                }else{
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
                return $cita->precio != null ? $cita->precio : '';
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

    public function convertDate($date)
    {
        setLocale(LC_ALL, 'spanish_ecuador.utf-8');
        $myDate = str_replace("/", "-", $date);
        $newDate = date('d-m-Y H:i:s', strtotime($myDate));
        return strftime('%A, %d de %B de %T %p', strtotime($newDate));
    }
}
