<!-- Modal Structure -->
  <div id="delete-{{$produto->id}}" class="modal">

    <div class="modal-content">
      <h4>
        <i class="material-icons">delete</i> Tem certeza? 
      </h4>

        <div class="row">
          <p>Tem certeza que deseja excluir {{$produto->nome}} ? </p>          
        </div> 
       

        <div class="row -ml-1">
          <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>

          <form action="{{route('admin.produtos.delete', $produto->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class=" waves-effect waves-green btn red right">Excluir</button>
          </form>

        </div>
        
    </div>
  </div>
  