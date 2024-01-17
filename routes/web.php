<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('users', UserController::class);//users.store


Route::group([
  'controller'=> SiteController::class

], function(){
  Route::get('/', 'index')->name('site-index') ;
  Route::get('/produto/{slug}', 'details')->name('site-details'); //exibir unico produto
  Route::get('/categoria/{id}', 'categoria')->name('site-categoria');

});

Route::group([
  'controller' =>CarrinhoController::class
], function(){
  Route::get('/carrinho', 'carrinhoLista')->name('site-carrinho');
  Route::post('/carrinho', 'adicionaCarrinho')->name('site-addcarrinho');
  Route::post('/remover', 'removeCarrinho')->name('site-removecarrinho');
  Route::post('/atualizar', 'atualizaCarrinho')->name('site-atualizacarrinho');
  Route::get('/limpar', 'limparCarrinho')->name('site-limparcarrinho');

});


Route::group([
   'controller' => LoginController::class
], function(){
  Route::view('/login', 'login.form')->name('login.form');
  Route::post('/auth', 'auth')->name('login.auth');
  Route::get('/logout', 'logOut')->name('login.logout');
  Route::get('/register', 'create')->name('login.create');

});


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']); //middleware vai negar o acesso ao dashboard se nn estiver logado 

Route::get('admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos'); //exibindo produtos

Route::delete('admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.delete'); //deletando produtos 


