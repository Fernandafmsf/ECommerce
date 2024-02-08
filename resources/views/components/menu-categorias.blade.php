<ul id="dropdown1" class="dropdown-content">
    @foreach($categoriasMenu as $categoriaM)
        <li><a href="{{route('site-categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
    @endforeach
</ul>
