<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <div class="ml-auto">
        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="cursor: pointer">
            <i class="fas fa-sign-out-alt" style="font-size: 20px"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
