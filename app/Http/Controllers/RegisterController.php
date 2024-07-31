<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);

        //Validación
        $this->validate($request,[
            'name' => 'required|min:5',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
            
        ]);
    }
}
