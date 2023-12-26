<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    
    public function index(){
        $produtos= Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function details($slug){

        $produto = Produto::where('slug', $slug)->first();//traz apenas um registro

        return view('site.details', compact('produto')); 

    }

    public function categoria($id)
    {
        $produtos = Produto::where('id_categoria', $id)->get();//get usado para retornar varios produtos que condizem com a condiçao

        return view('site.categoria', compact('produtos'));
    }

}
