<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login.index');
    }

    public function authenticate(Request $request){
        $cerdential= $request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required',
        ]);

        // Jika autentikasi sukses
        if(Auth::attempt($cerdential)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        };

        return back()->with('Error','Login failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
