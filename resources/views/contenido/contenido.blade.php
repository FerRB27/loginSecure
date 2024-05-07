@extends('layout.plantilla')

@section('title', 'Contenido Principal')

@section('content')
    <div class="container mx-auto max-w-2xl mt-24">
        <h1 class="text-center text-3xl textt-orange-600 mb-3">Contenido Principal</h1>
        <hr class="border-4 border-solid border-orange-700 mb-5">

        @auth
            <span class="text-blue-500 text-lg">Bienvenido </span>{{Auth::user()->name}}
        @endauth
            
        @endauth
        <a href="{{route('logout.destroy')}}" class="float-right hover:underline">Cerrar Sesion</a>

        <p class="bd-white px-5 p-6 mt-5 mb-7 leading-7">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Voluptatum corporis sequi nam doloremque commodi dolores impedit?
            Explicabo repellendus, necessitatibus ratione ea, ad eveniet nostrum,
            voluptates placeat aperiam doloremque praesentium? Excepturi. Lorem ipsum dolor sit amet consectetur,
            adipisicing elit. Rem quaerat, ratione et rerum nam assumenda! Quod soluta optio,
            architecto, laudantium in excepturi, numquam temporibus qui minima doloremque similique.
            Odit, accusamus!
        </p>
    </div>
@endsection