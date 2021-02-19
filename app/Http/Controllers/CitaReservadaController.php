<?php

namespace App\Http\Controllers;

use App\Traits\SplitNamesAndLastNames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaReservadaController extends Controller
{
    use SplitNamesAndLastNames;

    public function index()
    {
        return view('citasReservadas.index', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }
}
