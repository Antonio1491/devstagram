@extends('layouts.app')

@section('titulo')
  Perfil: {{$user->username}}
@endsection

@section('contenido')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
      <div class="w-8/12 lg:w-6/12 px-5">

        <img src="{{
            $user->imagen ?  
            asset('perfiles') . '/' . $user->imagen : 
            asset('img/usuario.svg')}}" 
            alt="usuario">
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
        
        <div class="flex items-center gap-2">
          <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
          @auth
            @if($user->id === auth()->user()->id)
            <a href="{{route('perfil.index')}}" class="text-gray-400 hover:text-gray-700 cursor-pointer">
              <svg data-slot="icon" fill="black" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"></path>
              </svg>
            </a>
            @endif
          @endauth
        </div>

        <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
          0
          <span class="font-normal">Seguidores</span>
        </p>
        <p class="text-gray-800 text-sm mb-3 font-bold">
          0
          <span class="font-normal">Siguiedo</span>
        </p>
        <p class="text-gray-800 text-sm mb-3 font-bold">
          0
          <span class="font-normal">Post</span>
        </p>
      </div>
    </div>
  </div>

  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    
    @if($posts->count())

    <div class="grid md:grid-cols-2 lg:cols-3 xl:grid-cols-4 gap-6">
      @foreach ($posts as $post)
      <div>
        <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
          <img src="{{asset('uploads') . '/' .$post->imagen}}" alt="Imagen del post {{$post->titulo}}">
        </a>
      </div>
      @endforeach
    </div>

    <div class="my-10">
      {{ $posts->links('pagination::tailwind') }}
    </div>

    @else
      <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
    @endif

  </section>
@endsection