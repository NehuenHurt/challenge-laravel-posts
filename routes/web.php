<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->user()) {
        return redirect('/home');
    } else {
        return redirect('/index');
    }
});
Route::get('/index', function () {
    if (auth()->user()) {
        return redirect('/home');
    } else {
        return view('auth/login');;
    } 
});
//Auth::routes();
Route::resource('usuarios', UsuariosController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('posts', PostsController::class);
Route::put('/sendEmail', [App\Http\Controllers\ContactController::class, 'sendEmail'])->name('sendEmail');
Route::get('/contacto', [App\Http\Controllers\ContactController::class, 'index'])->name('contacto');;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

