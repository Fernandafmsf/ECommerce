@extends('site.layout')
@section('title','Carrinho')

@section('conteudo')

<div class="row container">

  @if($mensagem = Session::get('sucesso'))
  
  <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>

  @endif

  @if($mensagem = Session::get('aviso'))
  
  <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Tudo bem! </span>
          <p>{{$mensagem}}</p>
        </div>
      </div>

  @endif

  <h3>Seu carrinho possui {{ $itens->count() }} produtos</h3>
 
  @if($itens->count()>0)
    <table class="stripped">

        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
  
  @endif
    
<!--itens pq estamos recebendo itens da funcao carrinhoLista do carrinho controller
Aqui vamos pegar os dados de itens -->
  
  @foreach ($itens as $item)
        <tr>
          <td>
            <img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle">
          </td>
          <td>{{$item->name}}</td>
          <td>R$ {{number_format($item->price, '2', ',', '.')}}</td>

          {{-- BTN ATUALIZAR --}}
          <form action="{{route('site-atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
             <input type="hidden" name="id" value="{{$item->id}}">

              <td>
                <input style="width: 40px; font-weight:700; " type="number" name="quantity" value="{{$item->quantity}}">
              </td>

              <td>
                <button class="btn-floating waves-effect waves-light green"><i class="material-icons"">refresh</i></button>
          </form>

          {{-- BTN DELETAR --}}
            <form action="{{route('site-removecarrinho')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>

            </form>

            
          </td>
        </tr>

  @endforeach

    </tbody>
  </table>

   <div class="row container center">
      
      <a href="{{route('site-index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>

      <a href="{{route('site-limparcarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>

      <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
      
    </div>


@endsection