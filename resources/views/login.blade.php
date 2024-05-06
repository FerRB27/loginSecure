@extends('layout.plantilla')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="container mx-auto max-w-2xl mt-24">
    
    <h1 class="text-center text-3xl textt-orange-600 mb-3">Inicio de Sesión</h1>
    <hr class="border-4 border-solid boder-orange-700 mb-5">

    <p class="text-ceter text-lg text-orange-400 mb-4">No  tienes Cuenta?
        <a href="{{route('registrate')}}" class="text-slate-500 hover:text-slate-700">Registrate aqui</a>
    </p>

    <form action="{{route('login.login')}}" method="POST" class="bg-white x-5 p-6">
        @csrf
        <input type="email" autocomplete="off" name="email" placeholder="ejemplo@email.com"
        class="block w-full p-2 mb-3 outline-non text-gray-400 border-b-2 border-gray-300">
        
        <input type="password" autocomplete="off" name="password" placeholder="password"
        class="block w-full p-2 mb-3 outline-non text-gray-400 border-b-2 border-gray-300">

        <input type="checkbox" name="remember" id="recordar">
        <label for="recordar" class="text-gray-700">Mantener sesion iniciada</label>

        <button class="mt-4 p-4 rounded-md block mx-auto bg-gray-400 hover:bg-gray-700 hover:text-white
        ease-in-out duration-300">Iniciar Sesión</button>

        @error('email')
            <div class="bg-red-900 text-white p-1 text-center mt-3">Error:: {{$message}}</div>
        @enderror
    </form>

</div>
@endsection