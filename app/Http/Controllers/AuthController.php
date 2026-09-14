<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    function registerPage(){
        return view('auth.register');
    }

    function LoginPage(){
        return view('auth.login');
    }

    function register(Request $request){

        $feilds = $request->validate([
            'name'=>['required','min:3','max:100','string'],
            'email'=>['required','email','max:50','unique:users'],
            'password'=>['required',Password::min(6)],
        ]);

        $user = User::create($feilds);
        Auth::login($user);
        return redirect('/');
    }

    function login(Request $request){

        $fields = $request->validate([
            'email'=>['required','email','max:50','exists:users,email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($fields)){
            return redirect('/')->with('success','You are now logged in!');
        }
        return redirect()
        ->back()
        ->withErrors(['error'=>'Wrong email or password!'])
        ->withInput($request->only('email'));
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
