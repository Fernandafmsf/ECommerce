
@if($mensagem = Session::get('sucesso'))
  
  <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Produto cadastrado com sucesso!</span>
          <p>{{$mensagem}}</p>
        </div>
  </div>
  @endif

  @if($mensagem = Session::get('removido'))
  <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Produto removido com sucesso!</span>
          <p>{{$mensagem}}</p>
        </div>
  </div>

  @endif

  @if($mensagem = Session::get('atualizado'))
  <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Produto atualizado com sucesso!</span>
          <p>{{$mensagem}}</p>
        </div>
  </div>

  @endif




  