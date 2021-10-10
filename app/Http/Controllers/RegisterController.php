<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title'=>'Register',
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required','min:3','max:25','unique:users'],
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:20',
        ]);

        // Enskripsi password
        $validateData['password']=Hash::make($validateData['password']);
        // add default role user
        $validateData['role_id']=3;
        // Create user
        $user= User::create($validateData);

        
        // flash message
        $request->session()->flash('registerSuccess','Registration successfull!');
        
        // FIXME: akun baru butuh diautentikasi ketika regis agar dapat masuk ke route verifikasi email
        event(new Registered($user));
        return redirect('/email/verify');
        
    }

}
