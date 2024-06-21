<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index($name=null){
        if ($name) {
            $user = User::where('name', $name)->firstOrFail();
            return view('admin.users.perfil', [
                'user' => $user,
            ]);
        } else {
            // Puedes redirigir a otra página o mostrar un mensaje de error
            return view('admin.users.perfil');
            // O si prefieres retornar una vista diferente, puedes hacer algo como:
            // return view('admin.users.no-name');
        }
    }

    public function editar_perfil(){
        return view('admin.users.editar-perfil');
    }

    public function editar_post(Request $request){
        //$request->request->add(['email' => Str::slug($request->email)]);
        //para mas de tres valores en el validate laravel recomienda usar como arreglo
        $request->validate([
            //'email' => 'required|unique:users|max:60',
            'tel' => 'required|min:9',
            'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'min:3', 'max:20'],
        ]);

        /*         if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        } */
        $usuario = User::find(auth()->user()->id);

        if($request->imagen){
            $nombre = $usuario->id.'.'.$request->file('imagen')->getClientOriginalExtension();
            // $img = $request->file('imagen')->storeAs('perfiles',$nombre);
            $img = $request->file('imagen')->storeAs('public/img',$nombre);
            $usuario->imagen = $nombre;
        }

        //Guardar cambios
        $usuario->email = $request->email;
        //$usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        //Redireccion al post.index
        return redirect()->route('perfil.index', $usuario->name);
    }
}
