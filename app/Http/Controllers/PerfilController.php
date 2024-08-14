<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
         //Modificar el Request para formatear un slug
         $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil'],
        ]);

        if($request->imagen)
        {
            $manager = new ImageManager(new Driver());

            $imagen = $request->file('imagen');

            // Convertir imagenes a cuadradas

            //uuid genera id único para cada imagen
            $nombreImagen = Str::uuid(). "." . $imagen->extension();

        
            $imagenServidor = $manager->read($imagen);

            // efecto intervention image recortar
            $imagenServidor->cover(1000, 1000);

            //guardamos en el servidor carpeta destino
            $imagenServidor->save(public_path('perfiles/' . $nombreImagen));
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        //comprobar campo vacío y si en la tabla no hay img se guardara null
        $usuario->imagen = $nombreImagen ?? auth()->user()->image ?? null;
        $usuario->save();
        
        return redirect()->route('posts.index', $usuario->username);

    }
}
