@extends('frontend.layouts.master', ['class_body' => 'business-global'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <span>Empresas</span>
    </div>

    <main class="main">
        <div class="content">
            <h1 class="title">
                Estas son las empresas que hoy por hoy tienen quejas activas por parte de la comunidad Dequr.
            </h1>
            <div class="form-search">
                <form action="#" method="POST">
                    <input type="text" placeholder="Buscar por nombre">
                    <button type="submit"></button>
                </form>
            </div>

            <div class="grid-business">

                @if(count($business) > 0 )
                    @foreach($business As $item)
                        <div class="item-box">
                            <div class="logo">

                                @if(!empty($item->logo))
                                    <img src="{{ asset('storage/photo_busines/' .$item->logo)}}" alt="{{ucwords(mb_strtolower($item->name))}}">
                                @else
                                    <img src="{{ asset('asset/frontend/assets/img/avatar-busines.png')}}" alt="{{ucwords(mb_strtolower($item->name))}}">
                                @endif

                            </div>
                            <div class="copy">
                                <h2 class="title">{{ucwords(mb_strtolower($item->name))}}</h2>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="star-completed"></span>
                                        <span class="star-completed"></span>
                                        <span class="star-completed"></span>
                                        <span class="star-completed"></span>
                                        <span class="star-empty"></span>
                                    </div>
                                    <div class="percentage">4.0%</div>
                                </div>
                                <div class="opinions">Opiniones
                                    @if($item->total_business < 10)
                                        {{'0'.$item->total_business}}
                                    @else
                                        {{$item->total_business}}
                                    @endif
                                </div>
                            </div>
                            <div class="buttons">
                                <a href="{{url('company/'.$item->slug)}}" class="btn-see">Ver empresa</a>
                                <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <a href="#" class="see-more">Ver más</a>
        </div>
    </main>
@endsection
