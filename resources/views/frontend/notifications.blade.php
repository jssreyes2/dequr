@extends('frontend.layouts.master', ['class_body' => 'notifications'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('profile.index')}}">Mi Perfil »</a>
        <span>Notificaciones</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box">
                <div class="box__header">
                    <h1 class="title">Notificaciones</h1>
                    <a href="{{route('profile.index')}}" class="btn-profile">Ir al perfil</a>
                </div>
                <div class="box__body">
                    <ul class="list">

                        @if(count($notifications) > 0)

                            @foreach($notifications as $item)
                                <li class="list__item">
                                    <p>Han respondido una publicación</p>
                                    <div class="right">
                                        <a href="{{url('complaints/'.$item->slug)}}" class="see-publication">Ver publicación</a>
                                        <span class="time">Hace un momento</span>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
