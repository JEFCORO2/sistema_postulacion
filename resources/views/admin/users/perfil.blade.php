@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')

    <h1 class=" d-flex justify-content-center fw-bold">Hola : {{auth()->user()->name}}</h1>
 
    <div class="">
        <div class="d-flex flex-row mb-3 justify-content-center align-items-center mt-5">

            <div class="w-25 h-25 d-inline-block">
                {{-- <img src="{{auth()->user()->imagen ?  Storage::url(auth()->user()->imagen) : asset('img/usuario.svg')}}" alt="imagen-usuario"> --}}
                <img src="/storage/{{auth()->user()->imagen}}" alt="usuario">
            </div>

            <div class="d-flex align-items-start flex-column mb-5 p-5">
                <p class="">{{auth()->user()->name}}</p>
                                
                <p class="">{{auth()->user()->email}}</p>

                <p class="">
                    0
                    <span class="font-normal">Postulaciones</span>
                </p>

                <a href="{{route('editar_perfil')}}" class="btn btn-info">Editar perfil</a>
            </div>
        </div>
    </div>
@endsection