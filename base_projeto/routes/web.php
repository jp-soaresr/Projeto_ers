<?php

use App\Http\Controllers\EstoqueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\VeiculoController;




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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('estoque', EstoqueController::class)->names([
    'index' => 'estoque.listar',
]);

Route::resource('categorias', CategoriaController::class);

Route::resource('clientes', ClienteController::class);

Route::resource('forma_pagamentos', FormaPagamentoController::class);

Route::resource('usuarios', UsuarioController::class);

Route::resource('veiculo', VeiculoController::class);

Route::resource('servicos', ServicoController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');




//gerando retalorio de estoque
Route::get('/produtos/relatorio', [EstoqueController::class, 'gerarPDF'])->name('estoque.relatorio');



// Rota para o Relatório Geral de todos os serviços
Route::get('/relatorio', [ServicoController::class, 'gerarRelatorioGeralPDF'])->name('relatorio');
// Rota para a Nota Fiscal de um serviço específico
Route::get('/servicos/{id}/nota', [ServicoController::class, 'gerarNotaFiscalPDF'])->name('servicos.notaFiscal');


