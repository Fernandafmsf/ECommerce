<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{

    public function index()
    {
        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function details($slug)
    {

        $produto = Produto::where('slug', $slug)->first();//traz apenas um registro
        //essa linha de codigo vai usar a funçao que definimos em AuthServices, que é uma logica para permitir que apenas os users que cadastraram um produto, consiga ver os detalhes do mesmo
        Gate::authorize('ver-produto', $produto);

        return view('site.details', compact('produto'));

    }

    public function categoria(Categoria $categoria): View
    {
        return view('site.categoria', [
            'categoria' => $categoria
        ]);
    }

}
