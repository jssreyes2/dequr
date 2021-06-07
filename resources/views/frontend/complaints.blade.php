@extends('frontend.layouts.master', ['class_body' => 'complaint'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('company.index')}}">Empresas »</a>
        <a href="{{route('Company.show')}}">Fuego de Vida »</a>
        <span>Ojo es falsa un timo</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box-content">
                <div class="copy">
                    <h1 class="title">Fuego de Vida España, ojo es falsa un timo más por Internet ESPAÑA, ojo es falsa, un timo</h1>
                    <div class="description">
                        <p>FUEGO DE VIDA, PAGINA WEB - ESPAÑA, buenos días. El siguiente post es para denunciar que la página web de Fuego de Vida es un auténtico timo, un engaño. </p>
                        <p>Los perfiles son falsos y las supuestas chicas que se supone que te escriben no son más que personas contratadas o bots con la única intención de que nos gastemos el dinero en un sistema que a claras luces es falso. </p>
                        <p>En mi caso he perdido 200 euros comprando créditos para hablar con las chicas hasta que me he dado cuenta de que estábamos ante una página fraudulenta. </p>
                        <p>Al principio las chicas te hablan de temas banales y parece que son personas reales, pero cuando va pasando el tiempo no hacen más que hablar de forma "guarra" por decirlo de alguna forma, su única intención es obviamente que pases el máximo tiempo posible hablando con ellas y cuando realmente quieres pasarle el whatsApp o un correo alegan que no nos conocemos lo suficiente</p>
                        <p> ¡Lo dicho un auténtico timo, no seais tan pardillos como yo que he perdido un dineral pensando que este sitio es falso. a mi favor he de decir que iba un poco pedo cuando entre, que no se como me engañaron de tal forma. </p>
                        <p>Os dejo también 3 webs que son las que me ayudaron a darme cuenta de cómo era el engaño. en ellas te explican lo de los bots y los perfiles falsos. </p>
                    </div>
                </div>
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
                <div class="comments">
                    <div class="comment">
                        <div class="comment__header">
                            <div class="user">
                                <div class="avatar">GQ</div>
                                <span class="name">@guillequinterot</span>
                            </div>
                            <div class="date">
                                - Abril 16, 2021
                            </div>
                        </div>
                        <div class="comment__body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam aliquam architecto, praesentium dolore excepturi aut? Voluptatem fuga, harum distinctio consectetur quisquam consequatur perferendis voluptatum repellat recusandae. Molestiae mollitia voluptatibus explicabo!</p>
                        </div>
                        <div class="comment__answer">
                            Responder
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment__header">
                            <div class="user">
                                <div class="avatar">GQ</div>
                                <span class="name">@guillequinterot</span>
                            </div>
                            <div class="date">
                                - Abril 16, 2021
                            </div>
                        </div>
                        <div class="comment__body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam aliquam architecto, praesentium dolore excepturi aut? Voluptatem fuga, harum distinctio consectetur quisquam consequatur perferendis voluptatum repellat recusandae. Molestiae mollitia voluptatibus explicabo!</p>
                        </div>
                        <div class="comment__answer">
                            Responder
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-business">
                <div class="logo">
                    <img src="{{ asset('asset/frontend/assets/img/logos/fuego-vida.png')}}" alt="Fuego de Vida">
                </div>
                <div class="right">
                    <div class="copy">
                        <h2 class="title">Fuego de Vida</h2>
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
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
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

            // Acción al boton de suscribirse a la discusión
            $('.btn-subscription').on('click', function(){
                $(this).toggleClass('active');
            });

            // Mostrar menú social para compartir
            $('.share .btn').on('click', function(){
                $(".share .social").toggleClass('active');
            });

            // JS para mostrar imagen cuando se cargue al comentario
            $('.commentary__body .input-file').change(function(e) {
                for (var i = 0; i < e.target.files.length; i++) {
                    $('.img-file').append('<div class="img"><i title="'+ e.target.files[i].name.split('.')[1] + '"></i></div>');
                    $('.commentary__body .btn-clear').addClass('active');

                }
            });
            $('.commentary__body .btn-clear').on('click', function() {
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
    </script>
@endsection
