@extends('layouts.app')

@section('titulo')
  Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
  <div class="md:flex md:justify-center">
    <div class="md:w1/2 bg-white shadow p-6">
      <form action="" class="mt-10 md:mt-10">
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username:
          </label>
          <input 
            id="username" 
            name="username" 
            type="text" 
            placeholder="Tu Nombre de Usuario"
            value="{{auth()->user()->username}}" 
            class="border p-3 w-full rounded-lg
              @error('username')
                border-red-500
              @enderror"
          >
          @error('username')
            <p class="text-red-500 my-2 rounded-lg text-sm p-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Imagen Perfil:
          </label>
          <input 
            id="imagen" 
            name="imagen" 
            type="file" 
            value="{{auth()->user()->username}}" 
            accept=".jpg, .jpeg, .png"
            class="border p-3 w-full rounded-lg"
          >
        </div>

        <input 
          type="submit" 
          value="Guardar Cambios"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full f-3 rounded text-white">
      </form>
    </div>
  </div>
@endsection