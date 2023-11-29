<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="fa-solid fa-database menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/category') }}">
                <i class="fa-solid fa-bars menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="fa-solid fa-flag menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/products') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/products') }}">
                <i class="fa-solid fa-list menu-icon"></i>
                <span class="menu-title">Product</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="fa-solid fa-palette menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="fa-solid fa-sliders menu-icon"></i>
                <span class="menu-title">Slider</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="fa-sharp fa-solid fa-credit-card menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/users') }}">
                <i class="fa-solid fa-users menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
    </ul>
</nav>
