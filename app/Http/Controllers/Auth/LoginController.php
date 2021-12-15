<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/profil');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('profil');
        } else {
            return redirect()->back()->
            with('status', 'User dan Password Salah');
        }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
    // use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}

