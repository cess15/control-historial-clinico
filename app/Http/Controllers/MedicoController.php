<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Medico;
use App\Traits\SplitNamesAndLastNames;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MedicoController extends Controller
{
    use SplitNamesAndLastNames;

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('medics.edit', compact('especialidades'), ['medico' => $medico, 'name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('medics.create', compact('especialidades'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'cedula' => ['required', 'ecuador:ci'],
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'unique:users,email'],
            'telefono' => ['required', 'unique:users,telefono'],
            'genero' => 'required',
            'usuario' => ['unique:users,usuario'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $user = new User();
        $medico=new Medico();
        $user->cedula = $request->cedula;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $username = $this->getUserName($user->nombres, $user->cedula);
        $user->usuario = $username;
        $user->password = bcrypt($user->cedula);
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->imagen_perfil='user_logo.png';
        $user->url_imagen_perfil='/foto/user_logo.png';
        $user->genero = $request->genero;
        $user->role_id = 2;
        $user->save();
        $medico->usuario_id=$user->id;
        $medico->especialidad_id=$request->especialidad_id;
        $medico->save();
        return redirect()->route('medicos.create')->with('msg', 'Datos guardados correctamente');
        
    }

    public function getUserName($nombre, $cedula)
    {
        $nick = Str::substr($nombre, 2, 6);
        $lastNick = Str::substr($cedula, 5, 9);
        $fullNick = $nick . '' . $lastNick;
        return Str::replaceFirst(' ', '', $fullNick);
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);
        $user = User::findOrFail($medico->usuario_id);
        $validate = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'unique:users,email,' . $medico->user->id],
            'telefono' => ['required', 'unique:users,telefono,' . $medico->user->id],
            'genero' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->genero = $request->genero;
        $user->update();
        $medico->especialidad_id = $request->especialidad_id;
        $medico->usuario_id = $user->id;
        $medico->update();
        return redirect()->route('medicos.edit', $medico->id)->with('msg', 'Datos guardados correctamente');
    }

    public function delete($id)
    {
        $medico = Medico::findOrFail($id);
        $user = User::findOrFail($medico->usuario_id);
        $user->delete();
        return redirect()->route('inicio');
    }

    public function findAll()
    {
        $medicos = Medico::all();
        return DataTables::of($medicos)
            ->addColumn('cedula', function ($medico) {
                return $medico->user->cedula != null ? $medico->user->cedula : '';
            })
            ->addColumn('nombres', function ($medico) {
                return $medico->user->nombres != null ? $medico->user->nombres : '';
            })
            ->addColumn('apellidos', function ($medico) {
                return $medico->user->apellidos != null ? $medico->user->apellidos : '';
            })
            ->addColumn('email', function ($medico) {
                return $medico->user->email != null ? $medico->user->email : '';
            })
            ->addColumn('telefono', function ($medico) {
                return $medico->user->telefono != null ? $medico->user->telefono : '';
            })
            ->addColumn('genero', function ($medico) {
                return $medico->user->genero != null ? $medico->user->genero : '';
            })
            ->addColumn('especialidad', function ($medico) {
                return $medico->especialidad->name != null ? $medico->especialidad->name : '';
            })
            ->addColumn('botones', 'medics.actions')
            ->rawColumns(['botones'])
            ->make(true);
    }
}
