<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens=\Cart::getContent();
        
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id'=> $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image'=> $request->img
            )

            ]);
           
            return redirect()->route('site-carrinho')->with('sucesso', 'Produto adicionado com sucesso');
            
    }

    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site-carrinho')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function atualizaCarrinho(Request $request){
        //update deve receber 2 parametros 
        \Cart::update($request->id, [
            'quantity'=>[ 
                'relative' => false, //atualizacao é relativa com o valor atual, devemos passar false pois queremos substituir o valor
                'value' =>$request->quantity,
            ],
            ]);
            
            return redirect()->route('site-carrinho')->with('sucesso', 'Produto atualizado com sucesso!');

    }

    public function limparCarrinho(){
        \Cart::clear();
        return redirect()->route('site-carrinho')->with('aviso', 'Seu carrinho está vazio'); 
    }
}
