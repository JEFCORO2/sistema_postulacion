<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index(){
        return view('prueba.test');
    }

    public function guardarNota(Request $request){
        $user = auth()->user();
        $user->nota = $request->input('score');
        $user->tiempo = $request->input('time_spent');
        $user->save();

        return view('admin.users.editar-perfil');
    }
}


