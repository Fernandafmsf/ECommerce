@if($mensagem= Session::get('erro'))
  {{$mensagem}}

@endif

<!--metodo validate armazerna erros em uma variavel chamada errors -->
@if($errors->any())
  @foreach($errors->all() as $error)
    {{$error}}
    <br>
  @endforeach

@endif

<form action="{{route('login.auth')}}" method="POST">
@csrf
<label for="email">Email: </label>
<input type="email" name="email">

<br><br>

<label for="email">Senha: </label>
<input type="password" name="password">
<br><br>
<button type="submit">Entrar</button>
</form>

