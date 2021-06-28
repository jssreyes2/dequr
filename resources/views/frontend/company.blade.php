@extends('frontend.layouts.master', ['class_body' => 'business'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('company.index')}}">Empresas »</a>
        <span>@if(isset($complaints[0]['busine_name'])){{ucwords(mb_strtolower($complaints[0]['busine_name']))}}@endif</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box-business">
                <div class="logo">

                    @if(isset($complaints[0]['logo']))
                        <img src="{{ asset('storage/photo_busines/' .$complaints[0]['logo'])}}" alt="{{ucwords(mb_strtolower($complaints[0]['busine_name']))}}"
                             style="width:auto!important;">
                    @else
                        <img src="{{ asset('asset/frontend/assets/img/avatar-busines.png')}}" alt="{{ucwords(mb_strtolower($complaints[0]['busine_name']))}}"                                               style="width:auto!important;">
                    @endif


                </div>
                <div class="copy">
                    <h1 class="title">@if(isset($complaints[0]['busine_name'])){{ucwords(mb_strtolower($complaints[0]['busine_name']))}}@endif</h1>
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
                        @if($complaintstotal < 10)
                            {{'0'.$complaintstotal}}
                        @else
                            {{$complaintstotal}}
                        @endif
                        | Bueno
                    </div>
                </div>
                <div class="buttons">
                    <a href="@if(isset($complaints[0]['company_site'])){{$complaints[0]['company_site']}}@endif" class="btn-web" target="_blank">Visitar página web</a>
                    <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                </div>
            </div>

            <div class="box-opinions">
                @foreach($complaints As $item)

                    @php
                        $date = \Carbon\Carbon::parse($item->created_at);

                        $arrfiles = json_decode($item->file_img, true);

                    @endphp


                    <div class="opinion-item">
                        <h2 class="title"><a href="{{url('complaints/'.$item->slug)}}">{{ucwords(mb_strtolower($item->title))}}</a></h2>
                        <p class="description">{!! $item->description !!}</p>
                        <div class="post-info">
                            <div class="user">
                                <div class="avatar">

                                    @if(!empty($item->avatar))
                                        <img src="{{ asset('storage/photo_users/' .$item->avatar)}}"
                                             alt="{{ucwords(mb_strtolower($item->firstname.' '.$item->lastname))}}" id="imgPreview" class="avatar">
                                    @else
                                        <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" alt="dequr" id="imgPreview" class="avatar">
                                    @endif

                                </div>
                                <span class="name">{{'@'.ucwords(mb_strtolower($item->firstname.' '.$item->lastname))}}</span>
                            </div>
                            <div class="date-location">
                                <span class="date">{{$date->toFormattedDateString()}}</span>
                                <span class="location">{{ucwords(mb_strtolower($item->country_name))}} - {{ucwords(mb_strtolower($item->state))}}</span>
                            </div>
                        </div>


                        <div class="tabs-files">

                            <ul class="tab-buttons">
                                <span class="btn archivo {{($item->file) ? 'download-file-complaint': ''}}" data-id="{{$item->id}}">Ver archivos</span>
                                <span class="btn imagen">Ver imágen</span>
                            </ul>

                            <div class="tab-content">


                                <div class="tab-item">
                                    <div class="files-grid" style="color:red!important">
                                        {{(!$item->file) ? 'No existe archivo para descargar': ''}}
                                    </div>
                                </div>

                                <div class="tab-item">
                                    <div class="images-grid">

                                        @if($arrfiles)
                                            @foreach($arrfiles as $key => $value)

                                                    @if (file_exists( $urlImg=storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR .$item->id. DIRECTORY_SEPARATOR . $value)))

                                                        <a href="{{ asset('storage/complaint_files/'.$item->id.'/'.$value)}}" data-lightbox="img-gallery">
                                                            <img src="{{ asset('storage/complaint_files/'.$item->id.'/'.$value)}}" alt="img">
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

                            <div class="commentary__body">
                                <form id="comment-form-{{$item->id}}">
                                    <input type="hidden" id="id{{$item->id}}" name="id{{$item->id}}" value="{{$item->id}}">
                                    <div class="wrap-input">
                                        <textarea id="comment{{$item->id}}" name="comment{{$item->id}}" placeholder="Escribe un comentario"></textarea>
                                    </div>
                                    <button class="btn-submit send_form" data-id="{{$item->id}}">Publicar</button>
                                </form>
                            </div>
                            <div id="loading-comment{{$item->id}}" style="display: none;">
                                <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}' style="float: right"/>
                            </div>


                        </div>
                    </div>
                @endforeach
                <a href="#" class="see-more">Ver más</a>
            </div>


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

        $(".send_form").click(function () {

            var id = $(this).data("id");
            var comment = $('#comment' + id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (!comment) {
                $('#comment' + id).addClass('tdtextarea error');
                return false;
            }

            $('#loading-comment' + id).show();
            $('.btn-submit').attr('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{route('comment.store')}}",
                cache: false,
                dataType: 'json',
                data: {'id': id, 'comment': comment},
                success: function (respuesta) {

                    $('#loading-comment' + id).hide();
                    showAlert(respuesta.alert, respuesta.status);
                    $('#comment-form-' + id)[0].reset();

                }
            });

        });


        $(".download-file-complaint").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("download_file_complaint", ":id") }}';
            url = url.replace(':id', dataId);
            window.location.href = url;
        });

    </script>
@endsection
