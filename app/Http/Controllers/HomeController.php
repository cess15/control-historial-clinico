<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\SplitNamesAndLastNames;

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
        return view('home', [ 'name' => $this->splitName(Auth::user()->nombres), 'lastName'=> $this->splitLastName(Auth::user()->apellidos)]);
    }
}
