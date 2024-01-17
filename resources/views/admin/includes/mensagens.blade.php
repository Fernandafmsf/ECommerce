@if($mensagem = Session::get('sucesso'))
  
  <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Produto removido com sucesso!</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>

  @endif


  