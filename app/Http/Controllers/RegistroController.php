<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index(){
        return view('auth.registro');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'apellidos' => 'required|max:70',
            'tel' => 'required|min:9',
            'email' => 'required|unique:users|max:60',
            'password' => 'required|confirmed|min:6',
            'estado' => 'nullable',
            'nota' => 'nullable',
            'tiempo' => 'nullable'
        ]);

        User::create([
            'name' => $request->name,
            'apellidos' => Str::slug($request->apellidos),
            'tel' => $request->tel,
            'rols_id' => 2,
            'estado' => null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nota' => null,
            'tiempo' => null
        ]);

        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('posts.index', auth()->user()->name);
    }
}
