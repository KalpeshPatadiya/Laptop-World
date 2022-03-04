<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1">
        {{-- <nav aria-label="breadcrumb"> --}}
            <a class="nav-visit" href="{{ url('retailer/dashboard') }}">
                <h5 class="font-weight-bolder mb-0">Dashboard</h5>
            </a>
        <a class="nav-visit me-auto" href="{{ url('retailer/orders') }}">
            <h5 class="font-weight-bolder mb-0">
                Orders
            </h5>
        </a>
        <h5 class="font-weight-bolder mb-0">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
        </h5>
    </div>
</nav>
<!-- End Navbar -->
