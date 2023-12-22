@extends('site.layout')
@section('title','Details')

@section('conteudo')

<div class="row container">
  <div class="col s12 m6">
    <img src="{{$produto->imagem}}" class="responsive-img" alt="">
  </div>

  <div class="col s12 m6">
    <h1>{{$produto->nome}}</h1>
    <p>{{$produto->descricao}}</p>
    <p>Cadastrado por {{ $produto->user->firstname}}<br>
      Categoria: {{$produto->categoria->nome}}
    </p>
    <button class="btn black btn-large"> Comprar </button>

  </div>
</div>

@endsection

