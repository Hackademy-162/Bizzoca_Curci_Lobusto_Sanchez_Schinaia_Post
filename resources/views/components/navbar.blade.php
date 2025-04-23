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
        <a href="#" class="nav-link text-dark" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
          @csrf
        </form>
        @if (Auth::user()->is_admin)
        <li><a class="dropdown-item text-dark pt-2 titolo" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
        @endif
        @if (Auth::user()->is_revisor)
        <li><a class="dropdown-item text-dark pt-2" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a></li>
        @endif
        @endauth
      </div>
    </div>
  </div>
</nav>
