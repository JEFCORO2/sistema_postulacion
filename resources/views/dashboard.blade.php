@extends('layouts.app')

@section('titulo')
    Perfil : {{$user->name}}
@endsection

@section('contenido')
    <div class="flex justify-start">
        
    </div>

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/usuario.svg')}}" alt="usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-gray-700 text-2xl">{{$user->name}}</p>
            </div>
        </div>
    </div>
@endsection