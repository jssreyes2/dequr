@extends('frontend.layouts.master', ['class_body' => 'categories'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <span>Categorías</span>
    </div>

    <main class="main">
        <div class="grid-categories">
            <div class="grid-categories__header">
                <h3 class="title">Busca por categorías</h3>
            </div>
            <div class="grid-categories__list">

                @if(count($categories) > 0)
                    @foreach($categories AS $item)
                        <a href="{{url('detail-category/'.$item->slug)}}">
                            <img src="{{ asset('asset/frontend/assets/img/icons/'.$item->icon)}}" alt="{{$item->name}}">
                            <h3>{{ucwords(mb_strtolower($item->name))}}</h3>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>

        @include('frontend.featured_opinions_category')

        @include('frontend.recent_opinions_category')

        @include('frontend.recent_activity_category')

    </main>
@endsection


@section('script')
    <script type="application/javascript">
        $('.featured-opinions .carousel').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            arrows: false,
            dots: false,
            draggable: true,
            autoplay: true,
            speed: 1000,
            centerMode: true,
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                    }
                }
            ]
        });
    </script>
@endsection
