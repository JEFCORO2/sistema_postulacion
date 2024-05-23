@extends('layouts.app')

@section('titulo')
    Registrate en el Sistema
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center">
        
        <div class="w-full md:w-4/12">
            <form action="{{route('registro')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombres
                    </label>

                    <input type="text" id="name" name="name" placeholder="Tu Nombre"
                    value="{{old('name')}}"
                    class="border p-3 w-11/12 rounded-lg @error('name') border-red-500                   
                    @enderror">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="apellidos" class="mb-2 block uppercase text-gray-500 font-bold">
                        Apellidos
                    </label>

                    <input type="text" id="apellidos" name="apellidos" placeholder="Tu Apellido"
                    value="{{old('apellidos')}}"
                    class="border p-3 w-11/12 rounded-lg @error('apellidos') border-red-500                   
                    @enderror">

                    @error('apellidos')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="tel" class="mb-2 block uppercase text-gray-500 font-bold">
                        Telefono
                    </label>

                    <input type="tel" id="tel" name="tel" placeholder="Tu Telefono"
                    value="{{old('tel')}}"
                    class="border p-3 w-11/12 rounded-lg @error('tel') border-red-500                   
                    @enderror">

                    @error('tel')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="text" id="email" name="email" placeholder="Tu Email"
                    value="{{old('email')}}"
                    class="border p-3 w-11/12 rounded-lg @error('email') border-red-500                   
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
                    class="border p-3 w-11/12 rounded-lg @error('password') border-red-500                   
                    @enderror" >

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu Contraseña"
                    class="border p-3 w-11/12 rounded-lg " >
                </div>

                <input type="submit" value="Crear Cuenta" 
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-11/12 p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection