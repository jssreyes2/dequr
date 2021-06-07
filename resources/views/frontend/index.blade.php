@extends('frontend.layouts.master', ['class_body' => 'index'])
@section('content')
    <div class="main-banner">
        <div class="flex">
            <div class="copy">
                <h1 class="title">Tu foro en español de <span>quejas y reclamos</span> en Colombia y Latinoamérica</h1>
                <p class="description"><a href="{{route('post_complaint.index')}}">Publica tu queja</a> y deja que nosotros junto a la comunidad <br> Dequr hagamos el resto</p>
                <a href="{{route('post_complaint.index')}}" class="btn-input">Escriba su queja con toda la información posible</a>
                <a href="{{route('post_complaint.index')}}" class="btn-primary">Publica tu queja</a>
            </div>
            <div class="wrap-image">
                <img src="{{ asset('asset/frontend/assets/img/robot-dequr.svg')}}" alt="Dequr">
            </div>
        </div>
    </div>

    <main class="main">
        <div class="featured-opinions">
            <h2 class="title">Opiniones destacadas</h2>
            <div class="carousel">
                <div class="carousel__item">
                    <h3 class="title">Fuego de vida, España pagina web, ojo es falsa un timo</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{ asset('asset/frontend/assets/img/logos/ike-asistencia.png')}}" alt="IKE Asistencia
                             Bogota">
                        </div>
                        <a href="{{route('Company.show')}}">IKE Asistencia Bogota</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">No atienden por ningún medio, pésimo servicio</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{ asset('asset/frontend/assets/img/logos/movilnet.png')}}" alt="Movilnet">
                        </div>
                        <a href="{{route('Company.show')}}">Movilnet</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">En plena pandemia cobran multa y no reciben el inmueble</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{ asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV  Inmobiliaria">
                        </div>
                        <a href="{{route('Company.show')}}">RV Inmobiliaria</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">Agencia de viajes Éxito es una estafa</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{ asset('asset/frontend/assets/img/logos/viajes-exito.png')}}" alt="Viajes Éxito">
                        </div>
                        <a href="{{route('Company.show')}}">Viajes Éxito</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">Fuego de vida, España pagina web, ojo es falsa un timo</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{asset('asset/frontend/assets/img/logos/vike-asistencia.png')}}" alt="IKE Asistencia Bogota">
                        </div>
                        <a href="{{route('Company.show')}}">IKE Asistencia Bogota</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">No atienden por ningún medio, pésimo servicio</h3>
                    <a href="{{route('complaint.index')}}#" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{asset('asset/frontend/assets/img/logos/movilnet.png')}}" alt="Movilnet">
                        </div>
                        <a href="{{route('Company.show')}}">Movilnet</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">En plena pandemia cobran multa y no reciben el inmueble</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV Inmobiliaria">
                        </div>
                        <a href="{{route('Company.show')}}">RV Inmobiliaria</a>
                    </div>
                </div>
                <div class="carousel__item">
                    <h3 class="title">Agencia de viajes Éxito es una estafa</h3>
                    <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    <div class="business">
                        <div class="logo">
                            <img src="{{asset('asset/frontend/assets/img/logos/viajes-exito.png')}}" alt="Viajes Éxito">
                        </div>
                        <a href="{{route('Company.show')}}">Viajes Éxito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="recent-opinions">
            <h2 class="title">Opiniones recientes</h2>
            <div class="grid">
                <div class="grid__item">
                    <div class="logo">
                        <img src="{{asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV Inmobiliaria">
                    </div>
                    <div class="copy">
                        <a href="{{route('Company.show')}}" class="name-business">RV Inmobiliaria</a>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Colombia - Bogotá</span>
                        </div>
                        <div class="rating">
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-empty"></span>
                        </div>
                        <h3 class="title">En plena pandemia cobran multa y no reciben el inmueble</h3>
                        <p class="description">Auxilio!, no puedo pagar el siguiente mes de arriendo y RV INMOBILIARIA, no quiere recibir el inmueble a menos que le pague 3 meses de arriendo más y/o consiga un arrendatario. radiqué la carta el 16 de julio y hasta el 15 de agosto...</p>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
                <div class="grid__item">
                    <div class="logo">
                        <img src="{{asset('asset/frontend/assets/img/logos/movilnet.png')}}" alt="Movilnet">
                    </div>
                    <div class="copy">
                        <a href="{{route('Company.show')}}" class="name-business">Movilnet</a>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Ecuador - Guayaquil</span>
                        </div>
                        <div class="rating">
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                        </div>
                        <h3 class="title">No atienden por ningún medio, pésimo servicio</h3>
                        <p class="description">Soy José Vite, escribo desde España y quiero denunciar la falta de atención a travez de cualquiera de los canales disponibles del iess. no responden email, nunca estan en skype y estoy desesperado pues no encuentro forma de...</p>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
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
                <div class="grid__item">
                    <div class="logo">
                        <img src="{{asset('asset/frontend/assets/img/logos/viajes-exito.png')}}" alt="Viajes Éxito">
                    </div>
                    <div class="copy">
                        <a href="{{route('Company.show')}}" class="name-business">Viajes Éxito</a>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Ecuador - Medellín</span>
                        </div>
                        <div class="rating">
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                        </div>
                        <h3 class="title">Agencia de viajes Éxito es una estafa</h3>
                        <p class="description">Compré un paquete de viaje en esta agencia que hay en los Almacenes Éxito del país, a los Estados Unidos, Orlando- Florida con entrada a parques Disney, de 8 días y 7 noches que costó 13 millones de pesos y para 4 personas, no se...</p>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
                <div class="grid__item">
                    <div class="logo">
                        <img src="{{asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV Inmobiliaria">
                    </div>
                    <div class="copy">
                        <a href="{{route('Company.show')}}" class="name-business">RV Inmobiliaria</a>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Ecuador - Bogotá</span>
                        </div>
                        <div class="rating">
                            <span class="star-completed"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                        </div>
                        <h3 class="title">En plena pandemia cobran multa y no reciben el inmueble</h3>
                        <p class="description">Auxilio!, no puedo pagar el siguiente mes de arriendo y RV INMOBILIARIA, no quiere recibir el inmueble a menos que le pague 3 meses de arriendo más y/o consiga un arrendatario. radiqué la carta el 16 de julio y hasta el 15 de agosto...</p>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
                <div class="grid__item">
                    <div class="logo">
                        <img src="{{asset('asset/frontend/assets/img/logos/movilnet.png')}}" alt="Movilnet">
                    </div>
                    <div class="copy">
                        <a href="{{route('Company.show')}}" class="name-business">Movilnet</a>
                        <div class="date-location">
                            <span class="date">Abril 16, 2021</span>
                            <span class="location">Ecuador - Guayaquil</span>
                        </div>
                        <div class="rating">
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-completed"></span>
                            <span class="star-empty"></span>
                            <span class="star-empty"></span>
                        </div>
                        <h3 class="title">No atienden por ningún medio, pésimo servicio</h3>
                        <p class="description">Soy José Vite, escribo desde España y quiero denunciar la falta de atención a travez de cualquiera de los canales disponibles del iess. no responden email, nunca estan en skype y estoy desesperado pues no encuentro forma de...</p>
                        <a href="{{route('complaint.index')}}" class="read-more">Ver reseña</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="other-opinions">
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
            <a href="#" class="see-more">Ver más</a>
        </div>

        <div class="company-profile">
            <div class="box">
                <div class="copy">
                    <h2 class="title">Crea el perfil de <br> tu compañia</h2>
                    <p class="description">La reputación de tu empresa es importante para nosotros y para la comunidad Dequr, regístrate y ofrece las respuestas que tus consumidores necesitan.</p>
                    @if(isset($user))
                        <a href="{{route('profile.index')}}" class="create-profile">Crear mi perfil</a>
                    @else
                        <a href="{{route('login')}}" class="create-profile">Crear mi perfil</a>
                    @endif
                </div>
                <div class="wrap-image">
                    <img src="{{asset('asset/frontend/assets/img/brands-business.png')}}" alt="Crear perfil de compañia">
                </div>
            </div>
        </div>
    </main>
@stop
