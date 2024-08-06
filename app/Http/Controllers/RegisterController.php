<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);

        //Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validación
        $this->validate($request,[
            'name' => 'required|min:5',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        // dd('creando usuraio');
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autenticar un usuario
        auth()->attempt($request->only('email', 'password'));

        //Redireccionamiento
        return redirect()->route('post.index');
        
    }
}
