<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('backend')}}" class="nav-link">Inicio</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-danger">
    <!-- Brand Logo -->
    <a href="{{route('backend')}}" class="brand-link text-center">
        <img src="{{ asset('asset/frontend/assets/img/logo.svg')}}" alt="Dequr" style="width: 40%;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/photo_users/' .Auth::user()->avatar)}}" class="img-circle elevation-2" alt="{{Auth::user()->lastname }}">
                @else
                    <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" class="img-circle elevation-2" alt="avatar">
                @endif

            </div>
            <div class="info">
                <a href="{{route('backend')}}" class="d-block">
                    {{Auth::user()->firstname }} {{Auth::user()->lastname }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @foreach ($menus as $key => $item)
                    @if ($item['parent'] != 0)
                        @break
                    @endif
                    @include('backend.layouts.menu-item', ['item' => $item])
                @endforeach

                <li class="nav-item has-treeview">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        <p>Salir del sistema</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" id="backend" name="backend" value="1">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
