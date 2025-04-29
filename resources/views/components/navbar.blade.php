<nav class="navbar navbar-expand-lg transition titolo">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="{{ route('homepage') }}">Homepage</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav d-flex justify-content-evenly w-100 text-center">
        @guest
        <a class="nav-link text-dark" href="{{ route('register') }}">Registrati</a>
        <a class="nav-link text-dark" href="{{ route('login') }}">Accedi</a>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('careers') }}">Lavora con noi</a>
        </li>
        @endguest
        @auth
        <span class="nav-link active text-dark">Benvenuto, {{ Auth::user()->name }}</span>
        <a class="nav-link text-dark" href="{{ route('article.create') }}">Crea tu un articolo</a>
        <a class="nav-link text-dark" aria-current="page" href="{{ route('article.index') }}">Tutti gli articoli</a>
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="{{ route('careers') }}">Lavora con noi</a>
        </li>
        
        <li class="nav-item drop-custom">
         <button class="btn border-dark btn-dropdown btn-sm rounded"><a class="nav-link active dropdown-toggle titolo" >Vai alla dashboard</a></button>
          <ul class="drop-menu dropdown-menu" >
            @if (Auth::user()->is_admin)
            <li><a class="dropdown-item text-dark pt-1 titolo text-center" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
            @endif
            @if (Auth::user()->is_revisor)
            <li><a class="dropdown-item text-dark pt-2 titolo text-center" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a></li>
            @endif
            @if (Auth::user()->is_writer)
            <li><a class="dropdown-item text-dark pt-2 titolo bordo-bttm text-center" href="{{ route('writer.dashboard') }}">Dashboard Writer</a></li>
            @endif
            <a href="#" class="nav-link dropdown-item text-dark ps-2 pt-1 pb-0 text-center" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
              @csrf
            </form>
          </ul>
        </li>
        @endauth
      </div>
      <form action="{{ route('article.search') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="query" placeholder="Cerca tra gli articoli..." aria-label="Search">
        <button class="btn btn-nav titolo" type="submit">Cerca</button>
      </form>
    </div>
    
  </div>
</nav>








