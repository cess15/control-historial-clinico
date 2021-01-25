<nav class="main-header navbar navbar-expand navbar-dark navbar-green">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Account Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle icon-profile"></i>
                <span class="float-right mb-1 text-light text-sm">
                    @if(Str::contains($user->nombres,' ') && Str::contains($user->apellidos,' '))
                    {{ Str::substr($user->nombres, 0, Str::length($user->nombres)/2).' '.Str::substr($user->apellidos, 0, Str::length($user->apellidos)/2) }}
                    @endif
                    @if(!Str::contains($user->nombres,' ') && !Str::contains($user->apellidos,' '))
                    {{ $user->nombres.' '.$user->apellidos}}
                    @endif
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-user mr-2"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i><span class="text text-danger"> Cerrar sesión</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>