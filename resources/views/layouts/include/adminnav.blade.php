<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
            <h5 class="font-weight-bolder mb-0">Dashboard</h5>
        </nav>
        <a class="nav-visit ms-auto" href="{{ url('/') }}">
            <h5 class="font-weight-bolder mb-0">
                <i class="bi bi-laptop"></i> VisitSite
            </h5>
        </a>
        <a href="{{ url('admin-profile') }}" class="btn ms-3 pt-4 text-successs">
            <i class="fas fa-user text-secondary"></i> {{ Auth::user()->name }}
        </a>
    </div>
</nav>
<!-- End Navbar -->
