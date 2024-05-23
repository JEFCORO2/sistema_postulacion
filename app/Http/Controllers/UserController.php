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
}
