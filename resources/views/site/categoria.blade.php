@extends('site.layout')
@section('title','Categoria')

@section('conteudo')

<div class="row container">

  <h3>Categoria:{{$categoria->nome}} </h3>
  @foreach ($categoria->produtos as $produto)
    <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="{{url("storage/{$produto->imagem}")}}">
            <a href="{{route('site-details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light black"><i class="material-icons">add</i></a>
          </div>

          <div class="card-content">
            <span class="card-title">{{$produto->nome}}</span>
            <p>{{Str::limit($produto->descricao, 20) }}</p>
          </div>
        </div>
  </div>
 @endforeach



 <div class="d-flex row center">


 </div>






@endsection
