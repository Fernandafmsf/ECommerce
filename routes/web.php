<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::group([
    'controller'=> ProdutoController::class,
    'prefix' => 'produtos', 
    'name'=>'produtos-'
], function(){
    Route::get('', 'index')->name('index');
});
