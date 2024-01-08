<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  @foreach($categoriasMenu as $categoriaM)
  <li><a href="{{route('site-categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
 @endforeach
</ul>


<!-- Dropdown2 Structure -->
<ul id="dropdown2" class="dropdown-content">
  
  <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li><a href="{{route('login.logout')}}">Sair</a></li>

</ul>
  

  <nav class="black">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo center">Compras </a>
      <ul id="nav-mobile" class="left">
        <li><a href="{{route('site-index')}}">Home</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias <i class="material-icons right">expand_more</i> </a></li>
        <li><a href="{{route('site-carrinho')}}">Carrinho</a></li>
      </ul>

      <ul id="nav-mobile" class="right">
      @auth
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Olá, {{auth()->user()->firstname}} <i class="material-icons right">expand_more</i> </a></li>
      @else
        <li><a  href="{{route('login.form')}}" >Login<i class="material-icons right">lock</i> </a></li>
      @endauth
       
      </ul>

    </div>
  </nav>

 

  @yield('conteudo')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var drop = document.querySelectorAll('.dropdown-trigger');
      M.Dropdown.init(drop,{
        coverTrigger: false, 
        constrainWidth:false,
      });
  });
  </script>

</body>
</html>