@extends('frontend.layouts.master', ['class_body' => 'categorie'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('category')}}">Categorías »</a>
        <span>{{ucwords(mb_strtolower($category->name))}}</span>
    </div>

    <main class="main">
        <div class="content">
            @if(isset($category))
                <h1 class="title">
                    <img src="{{ asset('asset/frontend/assets/img/icons/'.$category->icon)}}" alt="{{$category->name}}">
                    {{ucwords(mb_strtolower($category->name))}}
                </h1>
            @endif

            <div class="form-search">
                <form action="#" method="POST">
                    <input type="text" placeholder="Buscar por nombre">
                    <button type="submit"></button>
                </form>
            </div>

            <div class="grid-business">

                @foreach($business AS $item)
                    <div class="item-box">
                        <div class="logo">

                            @if(!empty($item->logo))
                                <img src="{{ asset('storage/photo_busines/' .$item->logo)}}" alt="{{ucwords(mb_strtolower($item->name))}}">
                            @else
                                <img src="{{ asset('asset/frontend/assets/img/avatar-busines.jpg')}}" alt="{{ucwords(mb_strtolower($item->name))}}">
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
                                | Bueno
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="{{url('company/'.$item->slug)}}" class="btn-see">Ver empresa</a>
                            <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="others-business">
                <div class="item-box">
                    <h2 class="title">Fuego de Vida España</h2>
                    <div class="right">
                        <div class="statistics">
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
                            <div class="opinions">Opiniones 150</div>
                        </div>
                        <div class="buttons">
                            <a href="empresa.php" class="btn-see">Ver empresa</a>
                            <a href="publica-tu-queja.php" class="btn-add-opinion">Agregar tu opinión</a>
                        </div>
                    </div>
                </div>
                <div class="item-box">
                    <h2 class="title">Fuego de Vida España</h2>
                    <div class="right">
                        <div class="statistics">
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
                            <div class="opinions">Opiniones 150</div>
                        </div>
                        <div class="buttons">
                            <a href="empresa.php" class="btn-see">Ver empresa</a>
                            <a href="publica-tu-queja.php" class="btn-add-opinion">Agregar tu opinión</a>
                        </div>
                    </div>
                </div>
                <div class="item-box">
                    <h2 class="title">Fuego de Vida España</h2>
                    <div class="right">
                        <div class="statistics">
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
                            <div class="opinions">Opiniones 150</div>
                        </div>
                        <div class="buttons">
                            <a href="empresa.php" class="btn-see">Ver empresa</a>
                            <a href="publica-tu-queja.php" class="btn-add-opinion">Agregar tu opinión</a>
                        </div>
                    </div>
                </div>
                <div class="item-box">
                    <h2 class="title">Fuego de Vida España</h2>
                    <div class="right">
                        <div class="statistics">
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
                            <div class="opinions">Opiniones 150</div>
                        </div>
                        <div class="buttons">
                            <a href="empresa.php" class="btn-see">Ver empresa</a>
                            <a href="publica-tu-queja.php" class="btn-add-opinion">Agregar tu opinión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
