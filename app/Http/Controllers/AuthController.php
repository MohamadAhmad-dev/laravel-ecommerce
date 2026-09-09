<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function registerPage(){
        return view('auth.register');
    }

    function LoginPage(){
        return view('auth.login');
    }
}
