<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::resource('produtos', ProdutoController::class);


Route::group([
  'controller'=> SiteController::class

], function(){
  Route::get('/', 'index')->name('site-index') ;
  Route::get('/produto/{slug}', 'details')->name('site-details'); //exibir unico produto

});

