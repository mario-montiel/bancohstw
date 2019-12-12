<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="{{ url('/') }}">HSTW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/asignar_prestamos') }}">Prestamos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/verificar-burocredito') }}">Buro de credito</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/ver_prestamos_lista') }}">Tus Prestamos</a>
            </li>

            @if (Auth::user()->type == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Administrador
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="{{ url('/gestionar_clientes') }}">Gestión de clientes</a>
                    <a class="dropdown-item" href="{{ url('/mostrar') }}">Gestión de cobranza</a>
                    <div class="nav-divider"></div>
                    <a class="dropdown-item" href="{{ url('/ver_prestamos_lista') }}">Prestamos</a>
                </div>
            </li>
            @endif
            @endauth

        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            @if (Route::has('login'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ url('/') }}">Perfil</a>
                        <a class="dropdown-item" href="{{ url('/cerrar-sesion') }}">Cerrar Sesion</a>
                    </div>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</nav>
<!--/.Navbar -->
