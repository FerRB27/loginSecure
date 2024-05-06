@extends('layout.plantilla')

@section('title', 'Regisrtate')

@section('content')

<div class="container mx-auto max-w-2xl mt-24">
    
    <h1 class="text-center text-3xl textt-orange-600 mb-3">Registrate</h1>
    <hr class="border-4 border-solid boder-orange-700 mb-5">

    <p class="text-ceter text-lg text-orange-400 mb-4">Ya  tienes Cuenta?
        <a href="{{route('login')}}" class="text-slate-500 hover:text-slate-700">Inicia sesion aqui</a>
    </p>

    <form action="{{route('registrate.registrate')}}" method="POST" class="bg-white x-5 p-6">
        @csrf

        {{-- 
            Variable error original en laravel, lista los errores segun
            las validaciones especificadas en el Controller
            --}}
        @if (count($errors)>0)
            <div class="bg-red-300 p-2 mt-2">
                <p class="text-red-500 mb-2">Corrige los siguientes errores</p>
                <ul class="list-disc pl-10">
                    @foreach ($errors->all() as $message)
                        <li class="text-red-500">{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <input type="text" autocomplete="off" name="name" value="{{old('name')}}" placeholder="Juan Perez"
        class="block w-full p-2 mb-3 outline-non text-gray-800 border-b-2 border-gray-300">

        <input type="email" autocomplete="off" name="email" value="{{old('email')}}" placeholder="ejemplo@email.com"
        class="block w-full p-2 mb-3 outline-non text-gray-800 border-b-2 border-gray-300">
        
        <input type="password" autocomplete="off" name="password" placeholder="Contraseña"
        class="block w-full p-2 mb-3 outline-non text-gray-800 border-b-2 border-gray-300">

        <input type="password" autocomplete="off" name="password_confirmation" placeholder="Confirme tu contraseña"
        class="block w-full p-2 mb-3 outline-non text-gray-800 border-b-2 border-gray-300">

        <button class="mt-4 p-4 rounded-md block mx-auto bg-gray-400 hover:bg-gray-700 hover:text-white
        ease-in-out duration-300">Registrate</button>
    </form>

</div>

@endsection