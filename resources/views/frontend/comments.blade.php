@extends('frontend.layouts.master', ['class_body' => 'comments'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <a href="{{route('profile.index')}}">Mi Perfil »</a>
        <span>Mis comentarios</span>
    </div>

    <main class="main">
        <div class="content">
            <div class="box">
                <div class="box__header">
                    <h1 class="title">Mis comentarios</h1>
                    <a href="{{route('profile.index')}}" class="btn-profile">Ir al perfil</a>
                </div>
                <div class="box__body">
                    <div class="grid">
                        <div class="grid__item">
                            <div class="logo">
                                <img src="{{ asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV Inmobiliaria">
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
                                <img src="{{ asset('asset/frontend/assets/img/logos/movilnet.png')}}" alt="Movilnet">
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
                        <div class="grid__item">
                            <div class="logo">
                                <img src="{{ asset('asset/frontend/assets/img/logos/viajes-exito.png')}}" alt="Viajes Éxito">
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
                                <img src="{{ asset('asset/frontend/assets/img/logos/rv-inmobiliaria.png')}}" alt="RV Inmobiliaria">
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
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
