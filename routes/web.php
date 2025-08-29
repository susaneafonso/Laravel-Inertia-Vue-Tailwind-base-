<?php

use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\ProductUpdateController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


//  Entendendo o funcionamento, começando com as rotas
// rota raiz; retorna a View Welcome; presente em resourse/javascript/pages
// .name é o nome da rota
// não possui interação com os controllers (mas a view chama a register)

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teste', function(){
    return Inertia::render('Pagmine');
})->name('teste');

// rotas novas

Route::get('/teste', function(){
    return Inertia::render('Pagmine');
})->name('teste');

Route::get('/produtos/cadastrar', [ProductController::class, 'index'])->name('prod-regist.index');
Route::post('/produtos/cadastrar/novo', [ProductController::class, 'store'])->name('prod-regist.store');
Route::post('/produtos/cadastrar/outro', [ProductController::class, 'create'])->name('prod-regist.create');

//

Route::post('/produtos/editar/antigo', [ProductUpdateController::class, 'create'])->name('prod.editar');
Route::post('/produtos/editar/novo', [ProductUpdateController::class, 'update'])->name('prod-edit.store');
Route::get('/produtos/editar', [ProductUpdateController::class, 'index'])->name('prod-edit.index');

// vendas
Route::get('/vendas', function(){ return Inertia::render('sales/Sales');})->name('sales.show');



Route::get('/produtos/exibir', function(){
    return Inertia::render('Welcome');
})->name('prod-list');

Route::get('/produtos/exibir', function(){
    return Inertia::render('Pagmine');
})->name('prod-list');






require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
