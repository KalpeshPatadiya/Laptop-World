<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1">
        <a class="nav-visit ms-0" href="{{ url('courier/dashboard') }}">
            <h5 class="font-weight-bolder mb-0">Dashboard</h5>
        </a>
        <h5 class="font-weight-bolder mb-0 ms-auto">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
        </h5>
        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" {{ __('Logout') }}>
            <h5 class="font-weight-bolder mb-0">
                <i class="bi bi-box-arrow-right"></i> Logout
            </h5>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
<!-- End Navbar -->
