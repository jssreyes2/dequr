@extends('frontend.layouts.master', ['class_body' => 'business'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('company.index')}}">Empresas »</a>
        <span>IKE Asistencia Colombia</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box-business">
                <div class="logo">
                    <img src="{{ asset('asset/frontend/assets/img/logos/ike-asistencia.png')}}" alt="IKE Asistencia Colombia">
                </div>
                <div class="copy">
                    <h1 class="title">IKE Asistencia Colombia</h1>
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
                    <div class="opinions">Opiniones 150 | Bueno</div>
                </div>
                <div class="buttons">
                    <a href="#" class="btn-web">Visitar página web</a>
                    <a href="publica-tu-{{route('complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                </div>
            </div>

            <div class="box-opinions">
                <div class="opinion-item">
                    <h2 class="title"><a href="{{route('complaint.index')}}">Estafadores me robaron 100.000 COP</a></h2>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id blanditiis magni consequuntur aliquid, harum, laborum deleniti eius libero hic laboriosam repellendus ipsa sint recusandae repellat quisquam! Eum eos at atque similique inventore accusamus ea corporis!</p>
                    <div class="post-info">
                        <div class="user">
                            <div class="avatar">GQ</div>
                            <span class="name">@guillequinterot</span>
                        </div>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Colombia - Bogotá</span>
                        </div>
                    </div>
                    <div class="tabs-files">
                        <ul class="tab-buttons">
                            <span class="btn archivo">Ver archivos</span>
                            <span class="btn imagen">Ver imágen</span>
                            <span class="btn audio">Oir audio</span>
                            <span class="btn video">Ver vídeo</span>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-item">
                                <div class="files-grid">
                                    <a href="" donwload>
                                        Prueba 1.docx
                                    </a>
                                    <a href="" donwload>
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
                            <div class="tab-item">
                                <div class="audios-grid">
                                    <audio controls>
                                        <source src="{{ asset('asset/frontend/assets/audio/audio1.mp3')}}" type="audio/mpeg">
                                    </audio>
                                    <audio controls>
                                        <source src="{{ asset('asset/frontend/assets/audio/audio2.mp3')}}" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="videos-grid">
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video1.mp4')}}" type="video/mp4">
                                    </video>
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video2.mp4')}}" type="video/mp4">
                                    </video>
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video3.mp4')}}" type="video/mp4">
                                    </video>
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
                            <form action="#">
                                <div class="wrap-input">
                                    <textarea placeholder="Escribe un comentario"></textarea>
                                    <label class="btn-file">
                                        <input type="file" class="input-file">
                                    </label>
                                </div>
                                <button type="submit" class="btn-submit">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="opinion-item">
                    <h2 class="title"><a href="{{route('complaint.index')}}">Estafadores me robaron 100.000 COP</a></h2>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id blanditiis magni consequuntur aliquid, harum, laborum deleniti eius libero hic laboriosam repellendus ipsa sint recusandae repellat quisquam! Eum eos at atque similique inventore accusamus ea corporis!</p>
                    <div class="post-info">
                        <div class="user">
                            <div class="avatar">GQ</div>
                            <span class="name">@guillequinterot</span>
                        </div>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Colombia - Bogotá</span>
                        </div>
                    </div>
                    <div class="tabs-files">
                        <ul class="tab-buttons">
                            <span class="btn archivo">Ver archivos</span>
                            <span class="btn imagen">Ver imágen</span>
                            <span class="btn audio">Oir audio</span>
                            <span class="btn video">Ver vídeo</span>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-item">
                                <div class="files-grid">
                                    <a href="" donwload>
                                        Prueba 1.docx
                                    </a>
                                    <a href="" donwload>
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
                            <div class="tab-item">
                                <div class="audios-grid">
                                    <audio controls>
                                        <source src="{{ asset('asset/frontend/assets/audio/audio1.mp3')}}" type="audio/mpeg">
                                    </audio>
                                    <audio controls>
                                        <source src="{{ asset('asset/frontend/assets/audio/audio2.mp3')}}" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="videos-grid">
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video1.mp4')}}" type="video/mp4">
                                    </video>
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video2.mp4')}}" type="video/mp4">
                                    </video>
                                    <video controls>
                                        <source src="{{ asset('asset/frontend/assets/video/video3.mp4')}}" type="video/mp4">
                                    </video>
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
                            <form action="#">
                                <div class="wrap-input">
                                    <textarea placeholder="Escribe un comentario"></textarea>
                                    <label class="btn-file">
                                        <input type="file" class="input-file">
                                    </label>
                                </div>
                                <button type="submit" class="btn-submit">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <a href="#" class="see-more">Ver más</a>
            </div>

            <div class="other-opinions">
                <h2 class="title">Actividad reciente en Dequr</h2>
                <div class="grid">
                    <div class="grid__item">
                        <div class="copy">
                            <div class="business-location">
                                <a href="{{route('Company.show')}}" class="business">Servibanca</a>
                                <span class="location">Colombia - Bogotá</span>
                            </div>
                            <h3 class="title">Servibanca - Bogotá, cobro de transacción sin que se realice y doblemente, que robo</h3>
                        </div>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                    <div class="grid__item">
                        <div class="copy">
                            <div class="business-location">
                                <a href="{{route('Company.show')}}" class="business">Servibanca</a>
                                <span class="location">Colombia - Bogotá</span>
                            </div>
                            <h3 class="title">Servibanca - Bogotá, cobro de transacción sin que se realice y doblemente, que robo</h3>
                        </div>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                    <div class="grid__item">
                        <div class="copy">
                            <div class="business-location">
                                <a href="{{route('Company.show')}}" class="business">Servibanca</a>
                                <span class="location">Colombia - Bogotá</span>
                            </div>
                            <h3 class="title">Servibanca - Bogotá, cobro de transacción sin que se realice y doblemente, que robo</h3>
                        </div>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                    <div class="grid__item">
                        <div class="copy">
                            <div class="business-location">
                                <a href="{{route('Company.show')}}" class="business">Servibanca</a>
                                <span class="location">Colombia - Bogotá</span>
                            </div>
                            <h3 class="title">Servibanca - Bogotá, cobro de transacción sin que se realice y doblemente, que robo</h3>
                        </div>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(function() {
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
    </script>
@endsection
