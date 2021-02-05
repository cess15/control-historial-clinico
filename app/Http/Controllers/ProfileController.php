<?php

namespace App\Http\Controllers;

use App\Traits\SplitNamesAndLastNames;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use SplitNamesAndLastNames;
    
    public function index()
    {
        return view('user.profile', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function edit()
    {
        return view('user.edit', ['name' => $this->splitName(Auth::user()->nombres), 'lastName' => $this->splitLastName(Auth::user()->apellidos)]);
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
