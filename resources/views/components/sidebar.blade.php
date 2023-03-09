<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('get.dashboard') }}" class="brand-link pl-4">
        <span class="brand-text font-weight-bold">TIVAA JEWELRY</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                @php
                    $route = \Request::route()->getName();
                    $route = explode('.', $route);
                @endphp

                <li class="nav-item">
                    <a href="{{ route('get.dashboard') }}" class="nav-link {{ $route[1] == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('get.products') }}" class="nav-link {{ $route[1] == 'products' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('get.providers') }}" class="nav-link {{ $route[1] == 'providers' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Nhà phân phối</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('get.categories') }}" class="nav-link {{ $route[1] == 'categories' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Danh mục</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('get.orders') }}" class="nav-link {{ $route[1] == 'orders' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>