@if(count($complaintsPromient) > 0)
    <div class="featured-opinions">
        <h2 class="title">Comentarios de empresas que trabajan con animales</h2>
        <div class="carousel">
            @foreach($complaintsPromient AS  $item)
                <div class="carousel__item">
                    <h3 class="title">{{ucwords(mb_strtolower($item->title))}}</h3>
                    <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            @if(!empty($item->logo))
                                <img src="{{ asset('storage/photo_busines/' .$item->logo)}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                            @else
                                <img src="{{ asset('asset/frontend/assets/img/avatar-busines.png')}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                            @endif
                        </div>
                        <a href="{{url('company/'.$item->busine_slug)}}">{{ucwords(mb_strtolower($item->busine_name))}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

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
