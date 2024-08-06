@extends('layouts.app')

@section('titulo')
  Crea una nueva Publicación
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

  <div class="md:flex md:items-center">

    <div class="md:w-1/2 px-10">
      <form action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
      @csrf
      </form>
    </div>

    <div class="md:w-1/2 p-10  bg-white rounded-lg shadow-xl mt-10 md:mt-0">
      <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
            Título:
          </label>
          <input 
            id="titulo" 
            name="titulo" 
            type="text" 
            placeholder="Título de la publicación"
            value="{{old('name')}}" 
            class="border p-3 w-full rounded-lg
              @error('name')
                border-red-500
              @enderror"
          >
          @error('name')
            <p class="text-red-500 my-2 rounded-lg text-sm p-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
            Descripción:
          </label>
          <textarea 
            id="descripcion" 
            name="descripcion" 
            type="text" 
            placeholder="Descripción de la publicación"
            class="border p-3 w-full rounded-lg
              @error('name')
                border-red-500
              @enderror"
          >
          {{old('name')}}
          </textarea>
          @error('name')
            <p class="text-red-500 my-2 rounded-lg text-sm p-2">{{ $message }}</p>
          @enderror
        </div>

        <input 
          type="submit" 
          value="Crear Publicación"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full f-3 rounded text-white">
      
      </form>
    </div>

  </div>
  
@endsection