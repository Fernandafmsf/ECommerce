<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     
    public function handle(Request $request, Closure $next)
    {
        //se o user nn estiver logado, será enviado para a tela de login
        if(!auth()->check()){
            return redirect(route('login.form'));
        }

        $email = auth()->user()->email; //pegando email
        $data = explode('@', $email); //verificando se é email gmail
        $servidorEmail = $data[1];

        //se nn for gmail, redirecionamos para login
        if($servidorEmail != 'gmail.com'){
            return redirect(route('login.form'));
        }

        //se nn entrar em nenhum if, a solicitação http terá sua continuação 
        return $next($request);
    }
}
