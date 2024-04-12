<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//classe autenticaçao

class LoginController extends Controller
{

    //receberemos via post email e senha
    // definir credenciais com o que vamos receber
    //metodo validate com um array com as credenciasi necessarias
    //validar os inputs como sendo do tipo email e required
    public function auth(LoginRequest $request): RedirectResponse
    {
        $credenciais = $request->validated();

        if (Auth::attempt($credenciais, $request->input('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->with('erro', 'Usuário ou senha inválida.');
    }

    public function logOut(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('site-index'));
    }

    public function create(): View
    {
        return view('login.create');
    }
}
