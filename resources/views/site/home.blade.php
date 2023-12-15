@extends('site.layout')
@section('title','Home')

@section('conteudo')

<h1>Nossa Home</h1>
{{--comentario--}}
{{-- isset($nome)? 'existe' : 'nao existe '--}}


  @include('includes.mensagem', ['titulo'=>'Mensagem de sucesso'])

  @component('components.sidebar')
      @slot('paragrafo')
          Texto qualquer vindo do slot
      @endslot
  @endcomponent


  @push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
  @endpush

  @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
  @endpush


@endsection