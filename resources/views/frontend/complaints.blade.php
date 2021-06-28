@extends('frontend.layouts.master', ['class_body' => 'complaint'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('company.index')}}">Empresas »</a>
        <a href="{{url('company/'.$complaint->busine_slug)}}">{{ucfirst(mb_strtolower($complaint->busine_name))}} »</a>
        <span>{{ucfirst(mb_strtolower($complaint->title))}}</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box-content">
                <div class="copy">
                    <h1 class="title">{{ucfirst(mb_strtolower($complaint->title))}}</h1>
                    <div class="description">
                        <p>{!! $complaint->description !!} </p>
                    </div>
                </div>
                <div class="post-info">
                    <div class="user">
                        <div class="avatar">

                            @if(!empty($complaint->avatar))
                                <img src="{{ asset('storage/photo_users/' .$complaint->avatar)}}"
                                     alt="{{ucwords(mb_strtolower($complaint->firstname.' '.$complaint->lastname))}}" id="imgPreview" class="avatar">
                            @else
                                <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" alt="dequr" id="imgPreview" class="avatar">
                            @endif

                        </div>
                        <span class="name">{{'@'.ucwords(mb_strtolower($complaint->firstname.' '.$complaint->lastname))}}</span>
                    </div>
                    <div class="date-location">
                        <span class="date">{{$date}}</span>
                        <span class="location">{{ucwords(mb_strtolower($complaint->country_name))}} - {{ucwords(mb_strtolower($complaint->state))}}</span>
                    </div>
                </div>
                <div class="tabs-files">
                    <ul class="tab-buttons">
                        <span class="btn archivo {{($complaint->file) ? 'download-file-complaint': ''}}" data-id="{{$complaint->id}}">Ver archivos</span>
                        <span class="btn imagen">Ver imágen</span>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-item">
                            <div class="files-grid" style="color:red!important">
                                {{(!$complaint->file) ? 'No existe archivo para descargar': ''}}
                            </div>
                        </div>

                        <div class="tab-item">
                            <div class="images-grid">
                                @if(isset($arrfiles))
                                    @foreach($arrfiles as $key => $value)

                                        @if (file_exists( $urlImg=storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR .$complaint->id. DIRECTORY_SEPARATOR . $value)))

                                            <a href="{{ asset('storage/complaint_files/'.$complaint->id.'/'.$value)}}" data-lightbox="img-gallery">
                                                <img src="{{ asset('storage/complaint_files/'.$complaint->id.'/'.$value)}}" alt="img">
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>


                <div class="commentary">
                    <div class="commentary__header">
                        <h3 class="title">Agregar tu opinion</h3>
                        <div class="right">
                            <div class="rating">
                                <div class="stars">
                                    <span class="star-completed"></span>
                                    <span class="star-completed"></span>
                                    <span class="star-completed"></span>
                                    <span class="star-completed"></span>
                                    <span class="star-empty"></span>
                                </div>
                                <div class="qualify">Calificar</div>
                            </div>
                            <div class="btn-subscription">
                                <span class="off">Suscríbete a esta discusión</span>
                                <span class="on">Suscrito</span>
                            </div>
                            <div class="share">
                                <span class="btn">Compartir</span>
                                <div class="social">
                                    <a href="#" class="social__facebook"></a>
                                    <a href="#" class="social__twitter"></a>
                                    <a href="#" class="social__linkedin"></a>
                                    <a href="#" class="social__whatsapp"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="commentary__body">
                        <form id="comment">
                            <input type="hidden" id="id" name="id" value="{{$complaint->id}}">
                            <div class="wrap-input">
                                <textarea id="comment" name="comment" class="required tdtextarea" placeholder="Escribe un comentario"></textarea>
                                {{--                                <label class="btn-file">--}}
                                {{--                                    <input type="file" class="input-file">--}}
                                {{--                                </label>--}}
                            </div>
                            <button type="submit" class="btn-submit">Publicar</button>
                        </form>
                    </div>

                    <div id="loading-comment" style="display: none;">
                        <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}' style="float: right"/>
                    </div>
                </div>

                <div class="comments">

                    @if(count($comments) > 0)
                        @foreach($comments AS $items)

                            @php
                                $date = \Carbon\Carbon::parse($items->created_at);
                            @endphp

                            <div class="comment">
                                <div class="comment__header">
                                    <div class="user">

                                        @if(!empty($items->user_id))
                                            <img src="{{ asset('storage/photo_users/' .$items->avatar)}}"
                                                 alt="{{ucwords(mb_strtolower($items->firstname.' '.$items->lastname))}}" id="imgPreview" class="avatar">
                                        @else
                                            <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" alt="dequr" id="imgPreview" class="avatar">
                                        @endif

                                        <span class="name">@
                                            @if($items->user_id)
                                                {{ucwords(mb_strtolower($items->firstname.' '.$items->lastname))}}
                                            @else
                                                {{'Anónimo'}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="date">
                                        - {{$date->toFormattedDateString()}}
                                    </div>
                                </div>
                                <div class="comment__body">
                                    <p>{!! $items->comment !!}</p>
                                </div>
{{--                                <div class="comment__answer">--}}
{{--                                    Responder--}}
{{--                                </div>--}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="box-business">
                <div class="logo">
                    @if(!empty($complaint->logo))
                        <img src="{{ asset('storage/photo_busines/' .$complaint->logo)}}" alt="{{ucwords(mb_strtolower($complaint->busine_name))}}">
                    @else
                        <img src="{{ asset('asset/frontend/assets/img/avatar-busines.png')}}" alt="{{ucwords(mb_strtolower($complaint->busine_name))}}">
                    @endif

                </div>
                <div class="right">
                    <div class="copy">
                        <h2 class="title">{{ucwords(mb_strtolower($complaint->busine_name))}}</h2>
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
{{--                        <a href="{{route('company.show')}}" class="btn-see">Ver empresa</a>--}}
                    </div>
                    <div class="numbers">
                        <div class="number-views">
                            @if($complaint->number_of_visit < 10) {{'0'.$complaint->number_of_visit}} @else {{$complaint->number_of_visit}} @endif vistas
                        </div>
                        <div class="number-comments">
                            @if($complaintstotal < 10) {{'0'.$complaintstotal}} @else {{$complaintstotal}} @endif comentarios
                        </div>
                    </div>
                </div>
            </div>

          @include('frontend.other_opinions', ['complaint_id' => $complaint->id])
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(function () {

            // Acción al boton de suscribirse a la discusión
            $('.btn-subscription').on('click', function () {
                $(this).toggleClass('active');
            });

            // Mostrar menú social para compartir
            $('.share .btn').on('click', function () {
                $(".share .social").toggleClass('active');
            });


            // Tabs de archivos adjuntos
            $('.tabs-files .tab-buttons span').click(function (g) {
                var tab = $(this).closest('.tabs-files'),
                    index = $(this).closest('span').index();

                tab.find('.tab-buttons span').removeClass('current');
                $(this).closest('span').addClass('current');
                $('.tab-content').addClass('active');

                tab.find('.tab-content').find('div.tab-item').not('div.tab-item:eq(' + index + ')').slideUp();
                tab.find('.tab-content').find('div.tab-item:eq(' + index + ')').slideDown();

                g.preventDefault();
            });
        });


        $(".download-file-complaint").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("download_file_complaint", ":id") }}';
            url = url.replace(':id', dataId);
            window.location.href = url;
        });

        $("body").on('submit', '#comment', function (event) {

            event.preventDefault()
            if ($('#comment').valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#loading-comment').show();
                $('.btn-submit').attr('disabled', true);

                var formData = new FormData(document.getElementById("comment"));

                $.ajax({
                    type: "POST",
                    url: "{{route('comment.store')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,
                    success: function (respuesta) {

                        $('#loading-comment').hide();
                        showAlert(respuesta.alert, respuesta.status);

                        if (respuesta.status == 'success') {
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            }
        });

    </script>
@endsection
