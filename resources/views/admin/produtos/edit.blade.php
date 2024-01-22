
<!-- Modal Structure -->
<div id="update-{{$produto->id}}" class="modal">

  <div class="modal-content">
    <h4>
      <i class="material-icons">playlist_add_circle</i> Editar produto
    </h4>

    <form action="{{route('admin.produtos.update', ['id'=>$produto->id])}}" method="POST" enctype="multipart/form-data"  class="col s12">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="input-field col s6">
          <input name="nome" id="nome" type="text" class="validate" value="{{$produto->nome}}">
          <label for="nome">Nome </label>
        </div>

        <div class="input-field col s6">
          <input name="preco" id="preco" type="text" class="validate" value="{{ $produto->preco }}">
          <label for="preco">Preço</label>
        </div>

        <div class="input-field col s6">
          <input name="descricao" id="descricao" type="text" class="validate" value="{{$produto->descricao}}">
          <label for="descricao">Descrição</label>
        </div>
      </div>


      <div class="input-field col s12">

        <select name="id_categoria">
          <option value="{{$produto->id_categoria}}"selected>{{$produto->id_categoria}}</option>

            @foreach($categorias as $categoria)             
              <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @endforeach
         
        </select>

        <label>Categoria</label>
      </div>   

      <div class="file-field input-field">
          <div class="btn">
            <span>Imagem</span>
            <input name="imagem" type="file">
          </div>

          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Trocar imagem...">
          </div>
        </div>
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        <button type="submit" class=" waves-effect waves-green btn green right">Atualizar</button>
        
        <br><br>

        
   
    </form>
</div>