<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = Produto::paginate(2);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        //se vier uma img faremos o upload da img com o metodo store, usando subpasta produtos. Vai retornar o path, que deve ser guardado no banco de dados, entoa precisamos armazenar esse valor em uma variavel(em $produto['imagem])
        if($request->imagem){
           $produto['imagem'] =  $request->imagem->store('produtos'); //mada para storage/app /produtos
        }

        $produto['slug'] = Str::slug($request->nome); //criando slug a partir do nome

        $produto = Produto::create($produto);


        return redirect()->route('admin.produtos')->with('sucesso', 'Cadastrado com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $produto = $request->all();

        if($request->imagem){
           $produto['imagem'] =  $request->imagem->store('produtos'); //mada para storage/app /produtos
        }

        Produto::find($id)->update($produto);
        return redirect()->route('admin.produtos')->with('atualizado', 'Atualizado com sucesso');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('removido', 'Produto removido com sucesso');
    }
}
