<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function formLogin() 
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $userWithUsername=Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password]);
        $userWithEmail=Auth::attempt(['email' => $request->usuario, 'password' => $request->password]);
        
        if ($userWithUsername===true || $userWithEmail===true) 
        {
            return redirect()->route('inicio');      
        } 
        return back()
            ->withErrors(['usuario' => trans('auth.failed'), 'password' => 'Por favor, ingrese su contraseña correctamente'])->withInput($request->input());
    }

    protected function validateLogin(Request $request) 
    {
        $this->validate($request, [
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
