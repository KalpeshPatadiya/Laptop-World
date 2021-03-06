<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-2 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <h4 class="text-align font-weight-bold text-white">LAPTOP WORLD</h4>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('slider') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('add-slider') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('edit-slider/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('slider') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">folder</i>
                    </div>
                    <span class="nav-link-text ms-1">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('categories') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('add-category') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('edit-category/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('categories') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('sub-category') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('add-sub-category') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('edit-sub-category/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('sub-category') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Brands</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('products') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('add-product') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('edit-product/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('products') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">badge</i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('orders') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('order-history') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('admin/view-order/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('orders') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">content_paste</i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('reviews') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('hidden-reviews') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('reviews') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">copy</i>
                    </div>
                    <span class="nav-link-text ms-1">Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('users') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('view-user/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('users') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <hr class="horizontal light mt-0 mb-2">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin-profile') ? 'active bg-gradient-primary' : '' }}
                    {{ Request::is('admin-profile/edit') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('admin-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" {{ __('Logout') }}>
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
