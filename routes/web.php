<?php

use App\Http\Controllers\ProdutosController;
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
    return view('index');
});

Route::prefix('produtos')->group(function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos.index');
    //add
    Route::get('/add', [ProdutosController::class, 'create'])->name('produto.add');
    Route::post('/add', [ProdutosController::class, 'create'])->name('produto.add');
    // edit
    Route::get('/edit/{id}', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('/edit/{id}', [ProdutosController::class, 'edit'])->name('produto.edit');
    // delete
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');

});

Route::prefix('clientes')->group(function() {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    //add
    Route::get('/add', [ClientesController::class, 'create'])->name('cliente.add');
    Route::post('/add', [ClientesController::class, 'create'])->name('cliente.add');
    // edit
    Route::get('/edit/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
    Route::put('/edit/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
    // delete
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');

});
