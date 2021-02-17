<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @if(Auth::user())
    <!-- Brand Logo -->
    <a href="{{ route('inicio')}}" class="brand-link">
        <img src="{{ asset('assets/img/24691611025869019.png') }}" alt="CAFSI Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->url_imagen_perfil }}" class="img-circle elevation-2 img_profile"
                    alt="{{ Auth::user()->imagen_perfil }}">
            </div>
            <div class="info">
                <a href="{{ route('perfil')}}" class="d-block">
                    {{$name. ' '.$lastName}}
                </a>
            </div>
            @endif
        </div>
        @if(Auth::user())
        @if(Auth::user()->updated)
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                @if(Auth::user()->role_id==1)
                <li class="nav-item">
                    <a href="{{ route('inicio') }}"
                        class="{{ Request::path() === 'inicio' ? 'nav-link active' : 'nav-link' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Médicos
                            <?php $count=App\Medico::all()->count();?>
                            <span class="right badge badge-info">{{ $count?? '0' }}</i>
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role_id==2)
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role_id==3)
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    @if(Auth::user()->role_id==2)
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                    @endif
                </li>

                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        @endif
        @endif
    </div>
    <!-- /.sidebar -->
</aside>