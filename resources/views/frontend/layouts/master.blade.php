<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.:: DEQUR ::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.layouts.css')
</head>
<body class="{{$class_body}}">

<header class="main-header">
    <div class="container">
        <div class="item">
            <a href="{{route('principal')}}" class="main-logo">
                <img src="{{ asset('asset/frontend/assets/img/logo.svg')}}" alt="Dequr">
            </a>

            <div class="form-search">
                <form action="{{route('search_complaint')}}" method="GET">
                    <input type="text" placeholder="Buscar" id="search" name="search" value="{{isset($search) ? $search : ''}}">
                    <button type="submit"></button>
                </form>
            </div>
            <div class="main-nav">
                <div class="main-nav__toggle hamburger hamburger--squeeze">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <div class="main-menu">
                    <a href="{{route('category')}}" class="btn-categories">Categorías</a>
                    @if(!$user)
                        <div class="buttons-access active">
                            <a href="{{route('register')}}" class="btn-register">Registrarse</a>
                            <a href="{{route('login')}}" class="btn-login">Iniciar sesión</a>
                        </div>
                    @endif

                    @if(isset($user))
                        <div class="buttons-panel active">
                            <a href="{{route('profile.index')}}" class="btn-profile">Hola, {{ucwords(mb_strtolower($user->firstname))}}</a>
                            <a href="{{route('Notification.index')}}" class="btn-notifications" title="Notificaciones"><span>Notificaciones</span></a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="btn-logout">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                <input type="hidden" id="frontend" name="frontend" value="1">
                                @csrf
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<!-- /.content-wrapper -->
<div class="main-footer">
    <div class="container">
        <div class="item">
            <div class="widget logo">
                <img src="{{ asset('asset/frontend/assets/img/logo-white.svg')}}" alt="Dequr">
            </div>
            <div class="widget list">
                <a href="#">Quejas</a>
                <a href="{{route('category')}}">Categorías</a>
                @if(!$user)
                    <a href="{{route('register')}}">Regístrate</a>
                    <a href="{{route('login')}}">Iniciar sesión</a>
                @endif
            </div>
            <div class="widget list">
                <a href="{{route('legal')}}">Legal</a>
                <a href="{{route('terms_and_conditions')}}">Términos y condiciones</a>
            </div>
            <div class="widget social">
                <p class="title">Síguenos en:</p>
                <a href="#" class="social-instagram"></a>
                <a href="#" class="social-facebook"></a>
                <a href="#" class="social-twitter"></a>
            </div>
        </div>
        <div class="item">
            <p class="copyright">
                &copy; 2021 Dequr. Todos los derechos reservados.
            </p>
        </div>
    </div>
</div>

@include('frontend.layouts.js')
@yield('script')
</body>
</html>
