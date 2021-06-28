<div class="modal" id="modal-description-complaint">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ucwords(mb_strtoupper($complaints->busine_name))}} / {{ucwords(mb_strtoupper($complaints->title))}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$complaints->description}}</p>

                <hr>
                <h3>Comentarios</h3>

                @if(count($commentComplaints)> 0)
                    @foreach($commentComplaints as $item)

                        @php
                            $date=\Carbon\Carbon::parse($item->created_at);
                        @endphp


                        <p>
                            @if(!empty($complaint->avatar))
                                <img src="{{ asset('storage/photo_users/' .$item->avatar)}}"
                                     alt="{{ucwords(mb_strtolower($item->firstname.' '.$item->lastname))}}" id="imgPreview" class="avatar" style="width:30px;">
                            @else
                                <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" alt="dequr" id="imgPreview" class="avatar" style="width:30px;">
                            @endif

                            <strong>
                                {{(($item->firstname) ? ' @'.ucwords(mb_strtolower($item->firstname.' '.$item->lastname)):' @ Anónimo')}}
                            </strong> -
                                {{$date->toFormattedDateString ()}}
                            <br>
                            <br>
                           <span style="color:#999">{{ucfirst(mb_strtolower($item->comment))}}</span>
                        </p>
                    @endforeach
                @endif

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
