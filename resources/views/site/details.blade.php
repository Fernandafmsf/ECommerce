@extends('site.layout')
@section('title','Details')

@section('conteudo')

<div class="row container"> <br>
  <div class="col s12 m6">
    <img src="{{$produto->imagem}}" class="responsive-img" alt="">
  </div>

  <div class="col s12 m6">
    <h4>{{$produto->nome}}</h4>
    <p>{{$produto->descricao}}</p>
    <p>R$ {{ number_format( $produto->preco, 2, ',', '.') }}</p>
    <p>Cadastrado por {{ $produto->user->firstname}}<br>
      Categoria: {{$produto->categoria->nome}}
    </p>

    <form action="{{route('site-addcarrinho')}}" method="POST" enctype="multipart/form-data">
      @csrf <!--proteçao da aplicacao-->
      <input type="hidden" name="id" value="{{$produto->id}}">
      <input type="hidden" name="name" value="{{$produto->nome}}">
      <input type="hidden" name="price" value="{{$produto->preco}}">
      <input type="number" name="quantity" min="1" value="1">
      <input type="hidden" name="img" value="{{$produto->imagem}}">
      <button type="submit" class="btn black btn-large"> Comprar </button>
    </form>
    
  </div>
</div>

@endsection

