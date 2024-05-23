<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Talento F5 - @yield('titulo')</title>
        @vite('resources/css/app.css')
    </head>
    <body class=" bg-gray-100">
        <!-- <nav>
            <a href="./">Principal</a>
            <a href="./nosotros">Nosotros</a>
            <a href="./tienda">Tienda</a>
        </nav> -->

        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black" >
                    Talento F5
                </h1>

                @auth
                    <nav class="flex gap-2 items-center">
                        <a href="#" class="font-bold text-gray-600 text-sm">
                            Hola : <span class="font-normal">{{auth()->user()->name}}</span>
                        </a>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold uppercaset text-gray-600 text-sm">
                                Cerrar Sesion
                            </button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class=" font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                        <a class=" font-bold uppercase text-gray-600 text-sm" href="{{route('registro')}}">
                            Crear Cuenta
                        </a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class=" mx-5 mt-10">
            <h2 class=" font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class=" mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Talento F5 - Todos los derechos reservados
            {{now()->year}} <!-- son helper :  basicamnete funciones que puedes usar en templates de laravel-->
        </footer>
    </body>
</html>