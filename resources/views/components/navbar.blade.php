<nav class="navbar navbar-expand-lg nav-scrolled transition fixed-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Homepage</a>
        </li>
        <li class="nav-item">
          @guest
          <li>
            <a class="nav-link" href="{{route('register')}}">Registrati</a>    
          </li>
          <li>
            <a class="nav-link" href="{{route('login')}}">Accedi</a>
          </li>
          @endguest
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto <a href="{{Auth::user()->name}}"></a>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form action="{{route('logout')}}" method="POST" id="logout-form" class="d-none">
              @csrf
            </form>
            
          </ul>
        </li>
        <li class="nav-item">

          <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
          
        </li>
        @endauth
      </ul>
      
    </div>
  </div>
</nav>