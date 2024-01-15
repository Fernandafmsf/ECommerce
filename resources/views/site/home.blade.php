@extends('site.layout')
@section('title','Home')

@section('conteudo')

<div class="row container">

  @foreach ($produtos as $produto)
    <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="{{$produto->imagem}}">

            @can('ver-produto', $produto)
            <a href="{{route('site-details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light black"><i class="material-icons">add</i></a>
            @endcan

            {{-- @cannot('ver-produto', $produto)

            @endcannot --}}
          </div>

          <div class="card-content">
            <span class="card-title">{{$produto->nome}}</span>
            <p>{{Str::limit($produto->descricao, 20) }}</p>
          </div>
        </div>
  </div>
 @endforeach
 


 <div class="d-flex row center">
  {{$produtos->links('custom.pagination')}}

 </div>
 





@endsection