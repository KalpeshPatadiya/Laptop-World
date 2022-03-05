<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
            <h5 class="font-weight-bolder mb-0">Dashboard</h5>
        </nav>
        @if (Auth::user()->role_as == '1')
            <a class="nav-visit ms-auto" href="{{ url('/') }}">
                <h5 class="font-weight-bolder mb-0">
                    <i class="bi bi-laptop"></i> VisitSite
                </h5>
            </a>
        @endif
        <a class="nav-visit" href="@if (Auth::user()->role_as == '1') {{ url('/admin-profile') }} @endif">
            <h5 class="font-weight-bolder mb-0">
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
            </h5>
        </a>
    </div>
</nav>
<!-- End Navbar -->
