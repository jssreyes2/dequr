@if(count($recentComplaints) > 0)
    <div class="other-opinions">

        @if(!isset($index))
            <h2 class="title">Actividad reciente en Dequr</h2>
        @endif

        <div class="grid">
            @foreach($recentComplaints AS $item)
                @if(isset($complaint_id))
                    @if($item->id != $complaint_id)
                        <div class="grid__item">
                            <div class="copy">
                                <div class="business-location">
                                    <a href="{{route('Company.show')}}" class="business">{{ucfirst(mb_strtolower($item->busine_name))}}</a>
                                    <span class="location">{{ucwords(mb_strtolower($item->country_name))}} - {{ucwords(mb_strtolower($item->state))}}</span>
                                </div>
                                <h3 class="title">{{ucfirst(mb_strtolower($item->title))}}</h3>
                            </div>
                            <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                        </div>
                    @endif
                @else
                    <div class="grid__item">
                        <div class="copy">
                            <div class="business-location">
                                <a href="{{route('Company.show')}}" class="business">{{ucfirst(mb_strtolower($item->busine_name))}}</a>
                                <span class="location">{{ucwords(mb_strtolower($item->country_name))}} - {{ucwords(mb_strtolower($item->state))}}</span>
                            </div>
                            <h3 class="title">{{ucfirst(mb_strtolower($item->title))}}</h3>
                        </div>
                        <a href="{{url('complaints/'.$item->slug)}}" class="read-more">Ver reseña</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
