<header class="mb-5">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Simple eCommerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
          </li>

          @auth
          @if (Auth()->user()->is_admin() || Auth()->user()->is_manager())
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.orders') }}">All Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.product.add') }}">Add Product</a>
          </li>
          @endif
          @if (Auth()->user()->is_admin())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Users
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="{{ route('admin.allUsers') }}">All Users</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.addUsers') }}">Add New User</a></li>
            </ul>
          </li>
          @endif
          @if (!Auth()->user()->is_admin() && !Auth()->user()->is_manager())
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('orders') }}">My Orders</a>
          </li>
          @endif
          @endauth
        </ul>
        <span class="navbar-text">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profileDropdown">
                <li>
                  <table>
                    <tr>
                      <td style="width: 60px;" class="py-2 ps-3 pe-2"><img class="img-fluid rounded-circle" src="@php
                        if(empty(auth()->user()->profile_image)) echo asset('/media/images/user.png');
                        else echo Storage::url('public/'.auth()->user()->profile_image);
                      @endphp"></td>
                      <td>Admin</td>
                    </tr>
                  </table>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item" href="{{ route('account') }}">My Account</a></li>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-link w-100 text-decoration-none text-white text-start">Logout</button>
                    </form>
                </li>
              </ul>
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