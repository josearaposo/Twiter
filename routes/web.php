<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/index', function () {
    return view('usuarios.user_index', [
        'seguidos' => Auth::user()->seguidos,
    ]);
})->middleware('auth')->name('usuarios.user_index');

Route::get('perfil/{usuario:name}', function ($usuario) {
    return view('usuarios.perfil', ['usuario' => User::where('name', '==', $usuario)->get()]);
})->middleware('auth')->name('usuarios.perfil');

Route::get('/usuarios/seguir/{usuario}', [ProfileController::class, 'seguir'])
    ->name('usuario.seguir');

Route::get('/usuarios/borrar/{usuario}', [ProfileController::class, 'borrar'])
    ->name('usuario.dejar');

/* Route::get('/posts/{post:slug}', function (Post $post) {
    return $post;
});
 */
require __DIR__.'/auth.php';
