<?php

namespace App\Http\Controllers;

use App\Cita;
use App\CitaReservada;
use App\Historial;
use App\Medico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\SplitNamesAndLastNames;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    use SplitNamesAndLastNames;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 2) {
            $medico = Medico::findOrFail(Auth::user()->medico->id);
            $citasReservadas = CitaReservada::join('citas', 'citas.id','=','citas_reservadas.cita_id')->where('pagada', true)->where('atendida', false)->where('medico_id', $medico->id)->paginate(6);
            return view('home', compact('citasReservadas'), ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
        }
        return view('home', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }
}
