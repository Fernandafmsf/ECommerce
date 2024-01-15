<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //criando autorização
        //gates servem pra auxiliar na permissao de usuarios, como users que podem ter acesso a algo enquanto outros nao podem 
        Gate::define('ver-produto', function(User $user, Produto $produto){
            return $user->id == $produto->id_user;

        });

        //
    }
}
