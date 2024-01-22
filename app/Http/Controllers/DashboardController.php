<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(){
        $usuarios = User::all()->count();//passando qtd de users pra dashboard

        //orm - eloquent -> metodos find, get, all... 

        //GRAFICO 1 - USUARIOS 
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total') //contar usuarios baseados no ano 
        ])
        ->groupBy('ano')//agrupando por ano 
        ->orderBy('ano', 'asc')//ordenando de forma ascendente
        ->get();
        //arrays a serem enviados para dashboard
        foreach($usersData as $user){
            $ano[]=$user->ano;
            $total[]=$user->total;
        }

        $userLabel = "'Comparativo de cadastro de Usuários'";
        $userAno= implode(', ', $ano); //modificando a variavel para que fique [2023, 2022]... 
        $userTotal = implode(',', $total);



        //GRAFICO 2 - CATEGORIAS
        $categoriaData = Categoria::with('produtos')->get();//produtos é a funçao criada no model Categoria
        
        //preparando array -> pegar nomes e quantidade de produto por categoria
        foreach($categoriaData as $categoria){
            $catNome[] = "'".$categoria->nome. "'"; // concatenando com aspas pq devemos levar ao JS uma string

            //pegando o total de produtos presente na categoria cujo id é igual ao id de $categoria
            $categoriaTotal[] = $categoria->produtos->count(); 
            
            //Produto::where('id_categoria', $categoria->id)->count();

        }

        //formatando array em string 
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $categoriaTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
