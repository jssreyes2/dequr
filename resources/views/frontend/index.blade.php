@extends('frontend.layouts.master', ['class_body' => 'index'])
@section('content')
    <div class="main-banner">
        <div class="flex">
            <div class="copy">
                <h1 class="title">Tu foro en español de <span>quejas y reclamos</span> en Colombia y Latinoamérica</h1>
                <p class="description"><a href="{{route('post_complaint.index')}}">Publica tu queja</a> y deja que nosotros junto a la comunidad <br> Dequr hagamos el resto</p>
                <a href="{{route('post_complaint.index')}}" class="btn-input">Escriba su queja con toda la información posible</a>
                <a href="{{route('post_complaint.index')}}" class="btn-primary">Publica tu queja</a>
            </div>
            <div class="wrap-image">
                <img src="{{ asset('asset/frontend/assets/img/robot-dequr.svg')}}" alt="Dequr">
            </div>
        </div>
    </div>

    <main class="main">

        @include('frontend.featured_opinions')

        @include('frontend.recent_opinions')

        @include('frontend.other_opinions', ['index' =>true])

        @include('frontend.company_profile')

    </main>
@stop
