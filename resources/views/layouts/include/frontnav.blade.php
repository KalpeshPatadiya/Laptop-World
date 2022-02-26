<nav class="navbar navbar-expand-lg navbar-dark shadow bg-body sticky-top">
    <div class="container">
        <a class="navbar-brand p-0 ml-auto" href="{{ url('/') }}">
            <img src="{{ asset('assets/logo/Laptop World (2).png') }}" style="width: 275px;"
                alt="Laptop World Logo">
        </a>
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="search-bar">
            <form id="search-form" action="{{ url('/searching') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="search_product" id="search_text" class="form-control"
                        placeholder="Search here">
                    <div class="input-group-append">
                        <button name="searchbtn" class="btn btn-outline-warning text-black" type="submit"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-css ms-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('collection') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('collection') }}">Collection</a>
                </li>
                <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('cart') }}"><i class="fas fa-shopping-cart text-success"></i> Cart
                        <span class="badge badge-pill cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('wishlist') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart text-danger"></i> Wishlist
                        <span class="badge badge-pill wishlist-count">0</span>
                    </a>
                </li>
            </ul>
            @guest
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <button class="btn btn-effect p-0 me-2"><a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </a></button>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <button class="btn btn-effect p-0"><a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </a></button>
                        </li>
                    @endif
                </ul>
            @else
                <li class="nav-link dropdown dropdown-menu-right py-0 ml-auto">
                    <a href="#" class="btn btn-effect nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user text-secondary"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->role_as == '0')
                            <li class="nav-item">
                                <a href="{{ url('my-profile') }}" class="dropdown-item btn-user">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('my-orders') }}" class="dropdown-item btn-user">My Orders</a>
                            </li>
                        @endif
                        @if (Auth::user()->role_as == '1')
                            <li class="nav-item">
                                <a class="dropdown-item btn-user" href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="dropdown-item btn-user" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div>
    </div>
</nav>
