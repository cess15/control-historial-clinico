<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
        </div>
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
                <li class="nav-item">
                    <a href="{{ route('citas.index') }}"
                        class="{{ Request::path() === 'citas' ? 'nav-link active' : 'nav-link' }}">
                        <i class="nav-icon fa fa-calendar-alt"></i>
                        <p>
                            Citas
                            <?php $count=App\Cita::all()->count();?>
                            <span class="right badge badge-info">{{ $count?? '0' }}</i>
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role_id==2)
                <li class="nav-item">
                    <a href="{{ route('inicio') }}"
                        class="{{ Request::path() === 'inicio' ? 'nav-link active' : 'nav-link' }}">
                        <i class="nav-icon fa fa-calendar-alt"></i>
                        <p>
                            Consultas
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role_id==3)
                <li class="nav-item">
                    <a href="{{ route('inicio') }}"
                        class="{{ Request::path() === 'inicio' ? 'nav-link active' : 'nav-link' }}">
                        <i class="nav-icon fa fa-calendar-alt"></i>
                        <p>
                            Citas Reservadas
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        @endif
    </div>
    <!-- /.sidebar -->
</aside>