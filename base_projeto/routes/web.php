<?php

use App\Http\Controllers\EstoqueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\CategoriaController;

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

Route::get('/login', [Login::class, 'showLoginForm'])->name('login');
Route::post('/login', [Login::class, 'login']);
Route::post('/logout', [Login::class, 'logout'])->name('logout');



Route::resource('estoque', EstoqueController::class);

Route::resource('categorias', CategoriaController::class);