<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Devstagram - @yield('titulo')</title>
      @stack('styles')
      @vite('resources/css/app.css')
      @vite('resources/js/app.js')
      @livewireStyles
  </head>
  <body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
      <div class="container mx-auto flex justify-between">
        <a href="{{route('home')}}" class="text-3xl font-black">
          DevStagram
        </a>

        @auth         
          <nav class="flex gap-2 items-center">
            <a 
              href="{{route('posts.create')}}" 
              class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#545454" d="M149.1 64.8L138.7 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-74.7 0L362.9 64.8C356.4 45.2 338.1 32 317.4 32L194.6 32c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                Crear
            </a>
            <a href="{{route('posts.index', auth()->user()->username)}}" class="font-bold text-gray-500 text-sm">
              Hola: 
              <span class="font-normal">
                {{auth()->user()->username}}
              </span>
            </a>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button type="submit" class="font-bold uppercase text-gray-500 text-sm">Cerrar Sesión</button>
            </form>
          </nav>
        @endauth

        @guest
          <nav class="flex gap-2 items-center">
            <a href="{{ route('login')}}" class="font-bold uppercase text-gray-500 text-sm">Login</a>
            <a href="{{ route('register')}}" class="font-bold uppercase text-gray-500 text-sm">Crear Cuenta</a>
          </nav>
        @endguest

      </div>
    </header>

    <main class="container mx-auto mt-10">
      <h2 class="font-black text-center text-3xl mb-10">
        @yield('titulo')
      </h2>
      @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
      Devstagram - Todos los derechos reservados {{ now()->year }}
    </footer>

    @livewireScripts
  </body>
</html>
    