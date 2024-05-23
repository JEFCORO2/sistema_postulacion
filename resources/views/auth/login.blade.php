@extends('layouts.app')

@section('titulo')
    Iniciar sesion
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5 ">
            <img src="{{asset('img/fondo.jpg')}}" alt="login">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="text" id="email" name="email" placeholder="Tu Email"
                    value="{{old('email')}}"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500                   
                    @enderror" >

                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>

                    <input type="password" id="password" name="password" placeholder="Contraseña"
                    value="{{old('password')}}"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500                   
                    @enderror" >

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Iniciar Sesion" 
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg mt-5">
                </div>
            </form>
        </div>
    </div>
@endsection
