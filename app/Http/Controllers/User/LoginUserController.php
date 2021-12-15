<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/');
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
    return redirect()->intended('/');
    } else {
    return redirect()->back()->
    with('status', 'User dan Password Salah');
    }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}