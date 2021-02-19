<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralExceptionError;
use App\Notifications\MedicoEmailNotification;
use App\Traits\SplitNamesAndLastNames;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        return view('user.index', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function create()
    {
        return view('user.create', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'cedula' => ['required', 'ecuador:ci', 'unique:users,cedula'],
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'unique:users,email'],
            'telefono' => ['required', 'unique:users,telefono'],
            'genero' => ['not_in:0'],
            'cargo' => ['required', 'integer', 'not_in:0'],
        ], [
            'cedula.ecuador' => 'validation.ecuador',
            'nombres.required' => 'El valor del campo :attribute es requerido',
            'apellidos.required' => 'El valor del campo :attribute es requerido',
            'email.required' => 'El valor del campo :attribute es requerido',
            'telefono.required' => 'El valor del campo :attribute es requerido',
            'genero.not_in' => 'El valor del campo :attribute seleccionado no es el correcto',
            'cargo.not_in' => 'El valor del campo :attribute seleccionado no es el correcto',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }

        $user = new User();
        $user->cedula = $request->cedula;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->usuario = $user->createUserName();
        $user->password = bcrypt($user->cedula);
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->imagen_perfil = 'user_logo.png';
        $user->url_imagen_perfil = '/foto/user_logo.png';

        if (hash_equals($request->genero, 'Masculino') || hash_equals($request->genero, 'Femenino')) {
            $user->genero = $request->genero;
        } else {
            throw new GeneralExceptionError('El valor del campo genero seleccionado no es el correcto');
        }

        if ($request->cargo >= 4 || $request->cargo <= 5) {
            $user->role_id = $request->cargo;
        } else {
            throw new GeneralExceptionError('El valor del campo cargo seleccionado no es el correcto');
        }
        $user->save();
        $user->notify(new MedicoEmailNotification($user->usuario, $user->cedula));
        return redirect()->route('users.create')->with('msg', 'Datos guardados correctamente');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'unique:users,email,' . $user->id],
            'telefono' => ['required', 'unique:users,telefono,' . $user->id],
            'genero' => ['not_in:0'],
            'cargo' => ['integer', 'not_in:0'],
        ]);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        
        if (hash_equals($request->genero, 'Masculino') || hash_equals($request->genero, 'Femenino')) {
            $user->genero = $request->genero;
        } else {
            throw new GeneralExceptionError('El valor del campo genero seleccionado no es el correcto');
        }
        
        if ($request->cargo >= 4 && $request->cargo <= 5) {
            $user->role_id = $request->cargo;
        } else {
            throw new GeneralExceptionError('El valor del campo cargo seleccionado no es el correcto');
        }
        $user->update();
        return redirect()->route('users.edit',$user->id)->with('msg', 'Datos actualizados correctamente');
    }

    public function delete($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function findAll()
    {
        $users = User::where('role_id', 4)->orWhere('role_id', 5)->get();
        return DataTables::of($users)
            ->addColumn('cedula', function ($user) {
                return $user->cedula != null ? $user->cedula : '';
            })
            ->addColumn('nombres', function ($user) {
                return $user->nombres != null ? $user->nombres : '';
            })
            ->addColumn('apellidos', function ($user) {
                return $user->apellidos != null ? $user->apellidos : '';
            })
            ->addColumn('email', function ($user) {
                return $user->email != null ? $user->email : '';
            })
            ->addColumn('telefono', function ($user) {
                return $user->telefono != null ? $user->telefono : '';
            })
            ->addColumn('genero', function ($user) {
                return $user->genero != null ? $user->genero : '';
            })
            ->addColumn('cargo', function ($user) {
                if ($user->role_id == 4) {
                    return $user->rol->nombre;
                } else if ($user->role_id == 5) {
                    return $user->rol->nombre;
                } else {
                    return '';
                }
            })
            ->addColumn('botones', 'user.actions')
            ->rawColumns(['botones'])
            ->make(true);
    }
}
