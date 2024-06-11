<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //dd(auth()->user()->rols_id);
        if(auth()->user()->rols_id == 1){
            $users = User::all();
        }else{
            //Listado por Roles
            $users = User::where('rols_id', 2)->get();
        }

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function actualizar(Request $request, $id){

        $user = User::where('id', $id)->firstOrFail();

        $request->validate([
            'tel' => 'required|min:9',
            'rols_id' => 'required'
        ]);

        $user->tel = $request->tel;
        $user->rols_id = $request->rols_id;

        $user->save();

        return redirect()->route('usuarios');
    }

    public function eliminar($id){
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('usuarios');
    }
}
