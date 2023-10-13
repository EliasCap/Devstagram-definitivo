<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class)->name('home');
// Rutas oara crearcion de cuenta
Route::get('/crear-cuenta',[RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store']);
// Rutas para logueo de cuenta
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
// Ruta para deslogueo
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
// Rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
// Ruta pra buscar por URL
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');
// Ruta para crear post
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class,'store'])->name('post.store');
// Ruta para crear añadir imagen al post
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
// Ruta para mostrar las imagenes posteadas
Route::get('/{user:username}/post/{post}',[PostController::class,'show'])->name('posts.show');
// Ruta para poder comentar publicaciones
Route::post('/{user:username}/post/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.destroy');
// Like a las fotos
Route::post('/post/{post}/likes',[LikeController::class, 'store'])->name('post.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class, 'destroy'])->name('post.likes.destroy');

Route::post('/{user:username},/follow',[FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username},/unfollow',[FollowerController::class, 'destroy'])->name('users.unfollow');
