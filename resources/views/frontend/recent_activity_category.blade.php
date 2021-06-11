@if(count($recentComplaints) > 0)

    <div class="recent-opinions">
        <h2 class="title">Actividad reciente en Dequr</h2>
        <div class="grid">

            @foreach($recentComplaints AS $item)
                <div class="grid__item">
                    <div class="copy">
                        <div class="business-location">
                            <a href="{{url('complaints/'.$item->slug)}}" class="business">{{ucfirst(mb_strtolower($item->busine_name))}}</a>
                            <span class="location">{{ucwords(mb_strtolower($item->country_name))}} - {{ucwords(mb_strtolower($item->state))}}</span>
                        </div>
                        <h3 class="title">{{ucfirst(mb_strtolower($item->title))}}</h3>
                    </div>
                    <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                </div>
            @endforeach

        </div>
    </div>

@endif
