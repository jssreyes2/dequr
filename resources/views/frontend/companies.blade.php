@extends('frontend.layouts.master', ['class_body' => 'business-global'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <span>Empresas</span>
    </div>

    <main class="main">
        <div class="content">
            <h1 class="title">
                Estas son las empresas que hoy por hoy tienen quejas activas por parte de la comunidad Dequr.
            </h1>
            <div class="form-search">
                <form action="#" method="POST">
                    <input type="text" placeholder="Buscar por nombre">
                    <button type="submit"></button>
                </form>
            </div>
            <div class="grid-business">
                <div class="item-box">
                    <div class="logo">
                        <img src="{{ asset('asset/frontend/assets/img/logos/ike-asistencia.png')}}" alt="IKE Asistencia Colombia">
                    </div>
                    <div class="copy">
                        <h2 class="title">IKE Asistencia Colombia</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
                <div class="item-box">
                    <div class="logo">
                        <img src="{{ asset('asset/frontend/assets/img/logos/fuego-vida.png')}}" alt="Fuego de Vida España">
                    </div>
                    <div class="copy">
                        <h2 class="title">Fuego de Vida España</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
                <div class="item-box">
                    <div class="logo">
                        <img src="assets/img/logos/rv-inmobiliaria.png" alt="RV Inmobiliaria">
                    </div>
                    <div class="copy">
                        <h2 class="title">RV Inmobiliaria</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
                <div class="item-box">
                    <div class="logo">
                        <img src="{{ asset('asset/frontend/assets/img/logos/viajes-exito.png')}}" alt="Viajes Éxito">
                    </div>
                    <div class="copy">
                        <h2 class="title">Viajes Éxito</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
                <div class="item-box">
                    <div class="logo">
                        <img src="{{ asset('asset/frontend/assets/img/logos/ike-asistencia.png')}}" alt="IKE Asistencia Colombia">
                    </div>
                    <div class="copy">
                        <h2 class="title">IKE Asistencia Colombia</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
                <div class="item-box">
                    <div class="logo">
                        <img src="{{ asset('asset/frontend/assets/img/logos/fuego-vida.png')}}" alt="Fuego de Vida España">
                    </div>
                    <div class="copy">
                        <h2 class="title">Fuego de Vida España</h2>
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
                        <div class="opinions">Opiniones 150</div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Company.show')}}" class="btn-see">Ver empresa</a>
                        <a href="{{route('post_complaint.index')}}" class="btn-add-opinion">Agregar tu opinión</a>
                    </div>
                </div>
            </div>
            <a href="#" class="see-more">Ver más</a>
        </div>
    </main>
@endsection
