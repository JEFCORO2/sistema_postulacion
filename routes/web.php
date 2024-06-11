<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {   //sintaxis closhun
    return view('principal');
});

//Login
Route::get('/login', [LoginController::class , 'index'])->name('login');
Route::post('/login', [LoginController::class , 'store']);

//Crear cuentas
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store']);

//Cerrar sesion
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Listar solo postulantes
Route::get('/postulantes', [UserController::class, 'index'])->name('postulantes');

//Configuracion Usuario
Route::get('/admin/perfil', [PerfilController::class, 'index'])->name('perfil.index');
//Editar perfil
Route::get('/admin/perfil-editar', [PerfilController::class, 'editar_perfil'])->name('editar_perfil');

//Post para formularios
Route::post('/admin/perfil', [PerfilController::class, 'editar_post'])->name('editar_post');

//Listar Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::post('/actualizar/{id}', [UserController::class, 'actualizar'])->name('user.actualizar');
Route::post('/eliminar/{id}', [UserController::class, 'eliminar'])->name('user.eliminar');

//Gestion de Roles
Route::get('/roles', [RolController::class, 'index'])->name('roles/crear');
Route::post('/roles', [RolController::class, 'crear']);

//Postulacion-Pruebas
Route::get('/test', [PruebaController::class, 'index'])->name('test');
Route::post('/guardar-nota', [PruebaController::class, 'guardarNota'])->name('guardar-nota');

//Control hacia las ventanas
Route::get('/{user:name}', [PostController::class, 'index'])->name('posts.index')->middleware('auth');



