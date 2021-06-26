@extends('frontend.layouts.master', ['class_body' => 'comments'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('profile.index')}}">Mi Perfil »</a>
        <span>Mis comentarios</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box">
                <div class="box__header">
                    <h1 class="title">Mis comentarios</h1>
                    <a href="{{route('profile.index')}}" class="btn-profile">Ir al perfil</a>
                </div>
                <div class="box__body">
                    <div class="grid">

                        @if(count($complaints) > 0)
                            @foreach($complaints AS  $item)

                                @php
                                    $date = \Illuminate\Support\Carbon::parse($item->created_at);
                                @endphp

                                <div class="grid__item">
                                    <div class="logo">

                                        @if(!empty($item->logo))
                                            <img src="{{ asset('storage/photo_busines/' .$item->logo)}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                                        @else
                                            <img src="{{ asset('asset/frontend/assets/img/avatar-busines.png')}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                                        @endif


                                    </div>
                                    <div class="copy" style="width: 1500px;">
                                        <a href="{{url('company/'.$item->busine_slug)}}" class="name-business">{{ucwords(mb_strtolower($item->busine_name))}}</a>
                                        <div class="date-location">
                                            <span class="date">{{$date->toFormattedDateString()}}</span>
                                            <span class="location">{{ucwords(mb_strtolower($item->country_name))}} - {{ucwords(mb_strtolower($item->state))}}</span>
                                        </div>
                                        <div class="rating">
                                            <span class="star-completed"></span>
                                            <span class="star-completed"></span>
                                            <span class="star-completed"></span>
                                            <span class="star-completed"></span>
                                            <span class="star-empty"></span>
                                        </div>
                                        <h3 class="title">{{ucwords(mb_strtolower($item->title))}}</h3>
                                        <p class="description">{!! \Illuminate\Support\Str::limit($item->description , 210); !!}</p>
                                        <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
