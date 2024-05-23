<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(){
        $rols = Rol::all();
        return view('admin.roles.index' , compact('rols'));   
    }

    public function crear(Request $request){
        $request->validate([
            'nombre' => 'required|max:20',
            'tipo' => 'required'
        ]);

        Rol::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo
        ]);

        return redirect()->route('roles/crear');
    }

    
}
