<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller
{
    public static function middleware(): array{
        return['auth'];
    }
    
    public function index(User $user){
        return view('index', [
            'user' => $user,
        ]);
    }

    public function store(){
        $users = User::all();
        //$userRole = auth()->user()->rols_id;
        return view('admin.users.index', compact('users'));
    }
}
