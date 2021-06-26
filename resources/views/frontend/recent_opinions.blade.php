<div class="recent-opinions">
    <h2 class="title">Opiniones recientes</h2>
    <div class="grid">

        @php
            $i=1;
        @endphp

        @foreach($complaints AS $item)

            @php
                $date = Carbon\Carbon::parse($item->created_at);
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
                    <p class="description">{!! Str::limit($item->description , 290); !!}</p>
                    <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                </div>
            </div>


            @if($i==2)
                @if(count($categories) > 0)
                    <div class="grid__item categories">
                        <div class="categories__header">
                            <h3 class="title">Categorías</h3>
                            <a href="{{route('category')}}" class="see-more">Ver categorías</a>
                        </div>
                        <div class="categories__list">

                            @foreach($categories AS $item)

                                @php
                                $icono=explode('.', $item->icon);
                                $icono=$icono[0].'-white.'.$icono[1];
                                @endphp

                            <a href="{{url('detail-category/'.$item->slug)}}">
                                <img src="{{asset('asset/frontend/assets/img/icons/'.$icono)}}" alt="{{ucwords(mb_strtolower($item->name))}}">
                                <h3>{{ucwords(mb_strtolower($item->name))}}</h3>
                            </a>
                            @endforeach

                        </div>
                    </div>
                @endif

            @endif

            @php
                $i++;
            @endphp

        @endforeach
    </div>
</div>
