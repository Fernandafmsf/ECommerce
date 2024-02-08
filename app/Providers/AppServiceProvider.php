<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //metodo de inicializacao
        // $categoriasMenu= Categoria::all();
        // view()->share('categoriasMenu', $categoriasMenu);//compartilhando dados com todas as views
    }
}
