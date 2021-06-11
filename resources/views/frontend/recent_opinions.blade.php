<div class="recent-opinions">
    <h2 class="title">Opiniones recientes</h2>
    <div class="grid">

        @php
            $i=1;
        @endphp

        @foreach($complaints AS $item)

            @php
                $date = \Illuminate\Support\Carbon::parse($item->created_at);
            @endphp

            <div class="grid__item">
                <div class="logo">

                    @if(!empty($item->logo))
                        <img src="{{ asset('storage/photo_busines/' .$item->logo)}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                    @else
                        <img src="{{ asset('asset/frontend/assets/img/avatar-busines.jpg')}}" alt="{{ucwords(mb_strtolower($item->busine_name))}}">
                    @endif

                </div>
                <div class="copy" style="width: 1500px;">
                    <a href="{{url('complaints/'.$item->slug)}}" class="name-business">{{ucwords(mb_strtolower($item->busine_name))}}</a>
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
                    <p class="description">{!! \Illuminate\Support\Str::limit($item->description , 290); !!}</p>
                    <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                </div>
            </div>


            @if($i==2)
                <div class="grid__item categories">
                    <div class="categories__header">
                        <h3 class="title">Categorías</h3>
                        <a href="{{route('category')}}" class="see-more">Ver categorías</a>
                    </div>
                    <div class="categories__list">
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/universidades-white.svg')}}" alt="Universidades">
                            <h3>Universidades</h3>
                        </a>
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/supermercados-white.svg')}}" alt="Supermercados">
                            <h3>Supermercados</h3>
                        </a>
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/transporte-white.svg')}}" alt="Transporte">
                            <h3>Transporte</h3>
                        </a>
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/telecomunicaciones-white.svg')}}" alt="Telecomunicaciones">
                            <h3>Telecomunicaciones</h3>
                        </a>
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/aerolineas-white.svg')}}" alt="Aerolíneas">
                            <h3>Aerolíneas</h3>
                        </a>
                        <a href="#">
                            <img src="{{asset('asset/frontend/assets/img/icons/bancos-white.svg')}}" alt="Bancos">
                            <h3>Bancos</h3>
                        </a>
                    </div>
                </div>
            @endif

            @php
                $i++;
            @endphp

        @endforeach
    </div>
</div>
