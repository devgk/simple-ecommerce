<header class="mb-5">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Book Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="/">Home</a>
          </li>

          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          @endauth
        </ul>
        <span class="navbar-text">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            @auth
            <li class="nav-item">
              <a class="nav-link text-white" href="#">{{ auth()->user()->name }}</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link text-decoration-none text-white">Logout</button>
              </form>
            </li>
            @endauth

            @guest
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
            </li>
            @endguest
          </ul>
        </span>
      </div>
    </div>
  </nav>
</header>