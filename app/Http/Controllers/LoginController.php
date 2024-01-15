<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //classe autenticaçao

class LoginController extends Controller
{

    //receberemos via post email e senha 
    // definir credenciais com o que vamos receber
    //metodo validate com um array com as credenciasi necessarias 
    //validar os inputs como sendo do tipo email e required 
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'], 
        ],[
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O email não é válido!',
            'password.required' => 'O campo senha é obrigatório',
            ]);

        //attempt verifica se existe usuario com as credenciais informadas. Cria sessao se tiver. 
        //criar novo id para a sessao 
        //redirecionamento com intended. Verifica se user vem de algum lugar. Por exemplo, necessidade de logar ao finalizar um carrinho-> vai ser mandado p login e dps pro carrinho de volta 

        //remember é uma 'ferramenta' do attemp, ele guarda o usuario como um cookie
        if(Auth::attempt($credenciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');

        }else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválida.');

        }

    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site-index'));
    }

    public function create(){
        return view('login.create');
    }
}
