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
           
            return redirect()->route('site-carrinho')->with('sucesso', 'Produto adicionado');
            
    }
}
