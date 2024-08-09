@extends('layouts.app')

@section('titulo')
  {{$post->titulo}}
@endsection

@section('contenido')
  <div class="container mx-auto flex">
    <div class="md:w-1/2">
      <img 
      src="{{asset('uploads') . '/' .$post->imagen}}" 
      alt="Imagen del post {{$post->titulo}}"
      class="w-full"
      >
      <div class="p-3">
        <p>0 Likes</p>
      </div>

      <div>
        <p class="font-bold">{{$post->user->username}}</p>
        <p class="text-sm text-gray-500">
          {{$post->created_at->diffForHumans()}}
        </p>
        <p class="mt-5">
          {{$post->description}}
        </p>
      </div>
    </div>
    <div class="md:w-1/2 p-5">
      <div class="shadow bg-white p-5 mb-5">
        @auth
          <p class="text-xl font-bold text-center mb-4">
            Agregar un comentario
          </p>

          <form action="">
            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
              comentario:
            </label>
            <textarea 
              id="comentario" 
              name="comentario" 
              type="text" 
              placeholder="Agregar un comentario"
              class="border p-3 w-full rounded-lg
                @error('comentario')
                  border-red-500
                @enderror"
            >
            </textarea>
            @error('comentario')
              <p class="text-red-500 my-2 rounded-lg text-sm p-2">{{ $message }}</p>
            @enderror

            <input 
              type="submit" 
              value="Comentar"
              class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full f-3 rounded text-white p-2">
          </form>
        @endauth
      </div>
    </div>

  </div>
@endsection