@extends('frontend.layouts.master', ['class_body' => 'complaint'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('company.index')}}">Empresas »</a>
        <a href="{{route('Company.show')}}">{{ucfirst(mb_strtolower($complaint->busine_name))}} »</a>
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
                        <div class="avatar">GQ</div>
                        <span class="name">@guillequinterot</span>
                    </div>
                    <div class="date-location">
                        <span class="date">{{$date}}</span>
                        <span class="location">{{ucwords(mb_strtolower($complaint->country_name))}} - {{ucwords(mb_strtolower($complaint->state))}}</span>
                    </div>
                </div>
                <div class="tabs-files">
                    <ul class="tab-buttons">
                        <span class="btn archivo">Ver archivos</span>
                        <span class="btn imagen">Ver imágen</span>
                        {{--                        <span class="btn audio">Oir audio</span>--}}
                        {{--                        <span class="btn video">Ver vídeo</span>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-item">
                            <div class="files-grid">
                                <a href="{{ asset('asset/frontend/assets/files/test.docx')}}" donwload>
                                    Prueba 1.docx
                                </a>
                                <a href="{{ asset('asset/frontend/assets/files/test.pdf')}}" donwload>
                                    Prueba 2.pdf
                                </a>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="images-grid">
                                <a href="https://picsum.photos/800/800" data-lightbox="img-gallery">
                                    <img src="https://picsum.photos/800/800" alt="img">
                                </a>
                                <a href="https://picsum.photos/900/700" data-lightbox="img-gallery">
                                    <img src="https://picsum.photos/900/700" alt="img">
                                </a>
                                <a href="https://picsum.photos/600/800" data-lightbox="img-gallery">
                                    <img src="https://picsum.photos/600/800" alt="img">
                                </a>
                            </div>
                        </div>
                        {{--                        <div class="tab-item">--}}
                        {{--                            <div class="audios-grid">--}}
                        {{--                                <audio controls>--}}
                        {{--                                    <source src="{{ asset('asset/frontend/assets/audio/audio1.mp3')}}" type="audio/mpeg">--}}
                        {{--                                </audio>--}}
                        {{--                                <audio controls>--}}
                        {{--                                    <source src="{{ asset('asset/frontend/assets/audio/audio2.mp3')}}" type="audio/mpeg">--}}
                        {{--                                </audio>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="tab-item">--}}
                        {{--                            <div class="videos-grid">--}}
                        {{--                                <video controls>--}}
                        {{--                                    <source src="{{ asset('asset/frontend/assets/video/video1.mp4')}}" type="video/mp4">--}}
                        {{--                                </video>--}}
                        {{--                                <video controls>--}}
                        {{--                                    <source src="{{ asset('asset/frontend/assets/video/video2.mp4')}}" type="video/mp4">--}}
                        {{--                                </video>--}}
                        {{--                                <video controls>--}}
                        {{--                                    <source src="{{ asset('asset/frontend/assets/video/video3.mp4')}}" type="video/mp4">--}}
                        {{--                                </video>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
                                        <div class="avatar">GQ</div>
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
                                <div class="comment__answer">
                                    Responder
                                </div>
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
                        <img src="{{ asset('asset/frontend/assets/img/avatar-busines.jpg')}}" alt="{{ucwords(mb_strtolower($complaint->busine_name))}}">
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
{{--                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>--}}
                    </div>
                    <div class="numbers">
                        <div class="number-views">
                            1.846.960 vistas
                        </div>
                        <div class="number-comments">
                            1.846.960 comentarios
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

            // JS para mostrar imagen cuando se cargue al comentario
            $('.commentary__body .input-file').change(function (e) {
                for (var i = 0; i < e.target.files.length; i++) {
                    $('.img-file').append('<div class="img"><i title="' + e.target.files[i].name.split('.')[1] + '"></i></div>');
                    $('.commentary__body .btn-clear').addClass('active');

                }
            });


            $('.commentary__body .btn-clear').on('click', function () {
                document.querySelector(".commentary__body .input-file").value = "";
                $(".img-file .img").remove();
                $(this).removeClass("active");
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
