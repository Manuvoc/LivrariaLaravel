<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\EmprestimosController;
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
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::post('usuario/search', [UsuarioController::class, 'search']);

    Route::resource('livros', LivrosController::class);
    Route::post('livros/search', [LivrosController::class, 'search']);

    Route::resource('estoque', EstoqueController::class);
    Route::post('estoque/search', [EstoqueController::class, 'search']);

    Route::resource('emprestimo', EmprestimosController::class);
    Route::post('emprestimo/search', [EmprestimosController::class, 'search']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';
