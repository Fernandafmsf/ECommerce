<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::resource('produtos', ProdutoController::class);


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


