@extends('frontend.layouts.master', ['class_body' => 'post-complaint'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <span>Publica tu queja</span>
    </div>

    <main class="main">
        <div class="content">
            <h1 class="title">Publica tu Queja</h1>
            <div class="flex">
                <div class="wrap-form">
                    <form role="form" id='form_queja' name='form_queja'>
                        <div class="wrap-input">
                            <input type="text" placeholder="Título de la queja" name="title" id="title" class="required">
                        </div>

                        <div class="wrap-input busine" style="display: none;">
                            <a class="list-busines" style="color: #0000ff; font-size: 12px;">Lista de empresa >></a>
                            <input type="text" placeholder="Empresa" name="busine" id="busine" class="required">
                        </div>

                        <div class="wrap-input busine_id">
                            <select class='required tdtextarea select-multiple' id='busine_id' name='busine_id'>
                                <option value="">
                                    Empresas
                                </option>
                                @foreach($busines AS $item)
                                    <option value="{{$item->id}}">
                                        {{ucwords(mb_strtolower($item->name))}}
                                    </option>
                                @endforeach

                                <option value="new">
                                    {{'Ninguna de las anteriores'}}
                                </option>
                            </select>
                        </div>


                        <div class="wrap-input">
                            <textarea name="description" id="description" class="required tdtextarea" placeholder="Escriba se queja con toda la información posible"
                                      onkeyup="countChars(this);"></textarea>
                            <p id="charNum">0 characters</p>
                        </div>
                        <div class="wrap-input files">
                            <div class="icons"></div>
                            <input type="file" class="input-file" id="file" name="file[]" multiple>
                            <div class="buttons">
                                <span class="btn-file">Adjuntar archivo<span>, foto, video o audio</span></span>
                                <span class="btn-clear" title="Eliminar archivos">X</span>
                            </div>
                        </div>

                        <div class="wrap-input">
                            <select class='required tdtextarea' id='category_id' name='category_id'>
                                <option value="">
                                    Categorías
                                </option>
                                @foreach($categories AS $item)
                                    <option value="{{$item->id}}">
                                        {{ucwords(mb_strtolower($item->name))}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex">
                            <div class="wrap-input">
                                <select class='required tdtextarea' id='country_id' name='country_id'>
                                    <option value="">
                                        País
                                    </option>
                                    @foreach($countries AS $item)
                                        <option value="{{$item->id}}">
                                            {{ucwords(mb_strtolower($item->name))}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="wrap-input">
                                <input type="text" name="state" id="state" class="required" placeholder="Provincia / Estado">
                            </div>
                        </div>
                        <div class="wrap-input">
                            <input type="text" name="company_site" id="company_site" placeholder="Sitio web de la empresa">
                        </div>

                        <div class="wrap-input">
                            <img src='{{asset('asset/backend/img/loadingfrm.gif')}}' id='loading' style='display: none; margin: auto;'/>
                        </div>
                        <button type="submit" class="btn-submit btn-login">Publica tu queja</button>
                    </form>
                </div>
                <div class="additional-info">
                    <h3 class="title">Tu denuncia es importante para nosotros.</h3>
                    <p>Por ello, te recomendamos que agregues la mayor cantidad de detalles e información posible. </p>
                    <p>Mientras más información facilites, tu reclamo o queja será evaluada con mayor rapidez y tendrá soluciones en menor tiempo.</p>
                    <ul>
                        <li>Menos de 200 Palabras: Pereza. Tu queja no se publica.</li>
                        <li>De 200 a 750 palabras. Demasiado Preciso. Tu denuncia será publicada pero no será tan vista.</li>
                        <li>De 750 a 2.000 palabras tu denuncia tendrá muy buena exposición en el sitio y será compartida a través de las redes de Dequr.</li>
                        <li>2.000 palabras en adelante tu denuncia tendrá toda la atención por parte de el público y será muy visitada de eso nos encargamos nosotros.</li>
                    </ul>
                    <div class="extra">
                        <b>Algunas recomendaciones:</b>
                        <p>- No escriba todo en mayúscula. - No escriba groserías, no es una buena idea. - No insulte a otros usuarios. - Trate de usar la tecla enter, no escriba
                            todo en un mismo párrafo. - No usar abreviaciones. - No se recomienda incluir nombres de personas, para hacerlo debes hacer un registro completo.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal inicio de sesión -->
    <div class="modal-login">  <!-- Asignar clase "active" a este div para mostrar la modal -->
        <div class="content">
            <div class="box">
                <span class="btn-close">X</span>

                <h2 class="title">Ingresa en <img src="{{asset('asset/frontend/assets/img/logo.svg')}}" alt="dequr"> para publicar tu queja</h2>
                <div class="social-login">
                    <a href="#" class="social-facebook"><img src="{{asset('asset/frontend/assets/img/icons/facebook.svg')}}" alt="facebook"> Continuar con Facebook</a>
                    <a href="#" class="social-twitter"><img src="{{asset('asset/frontend/assets/img/icons/twitter.svg')}}" alt="twitter"> Continuar con Twitter</a>
                    <a href="#" class="social-google"><img src="{{asset('asset/frontend/assets/img/icons/google.svg')}}" alt="google"> Continuar con Google</a>
                </div>
                <div class="wrap-login">
                    <form role="form" id='form_login' name='form_login'>
                        <div class="wrap-input">
                            <input type="email" id="email" name="email" class="required email" placeholder="Correo electrónico *">
                        </div>
                        <div class="wrap-input">
                            <input type="password" id="password" name="password" class="required" placeholder="Contraseña *">
                        </div>

                        <div class="wrap-input">
                            <img src='{{asset('asset/backend/img/loadingfrm.gif')}}' id='loading_login' style='display: none; margin: auto;'/>
                        </div>

                        <button type="submit" class="btn-login">Iniciar sesión</button>
                        <a href="#" class="recover-password">¿Olvidó su contraseña?</a>
                        <p class="create-account">¿No tienes una cuenta? <a href="{{route('register')}}">Regístrate aquí</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="application/javascript">

        $(document).ready(function () {
            $('.select-multiple').select2();
        });

        function countChars(obj) {
            document.getElementById("charNum").innerHTML = obj.value.length + ' characters';

            if (obj.value.length <= 400) {
                $('#charNum').attr('style', 'color:red');
            }else{
                $('#charNum').attr('style', 'color:green');
            }
        }


        //JS para modal de inicio de sesión
        $(".modal-login .btn-close").on("click", function () {
            $(".modal-login").removeClass("active");
        });

        $("#busine_id").change(function () {
            if ($('#busine_id').val() == 'new') {
                $('#busine_id').val('');
                $('.busine_id').hide();
                $('.busine').show();
            }
        });

        $(".list-busines").click(function () {
            $('.busine_id').show();
            $('#busine').val('');
            $('.busine').hide();
        });


        //$(".modal-login").addClass("active");

        // JS para selector de país
        $(function () {
            $('.select-country .btn-icon').click(function (e) {
                e.preventDefault();
                $(this).toggleClass('open');
                $(this).parent().next('.select-country__body').toggleClass('open');
                $('.select-country__header').toggleClass('active');
            });
            $('.select-country label').click(function () {
                $(this).addClass('open').siblings().removeClass('open');
                $('.select-country__body, .select-country .btn-icon').removeClass('open');
                $('.select-country__header').removeClass('active');
            });
            $('.select-country input[name="pais"]').change(function () {
                var value = $("input[name='pais']:checked").val();
                $('.select-country .title').text(value);
                $('.select-country .title').addClass('active');
            });
        });

        // JS para adjuntar archivos
        $(function () {
            $('.files .btn-file').on('click', function () {
                $('.input-file').click();
            });
            $('.files .input-file').change(function (e) {
                for (var i = 0; i < e.target.files.length; i++) {
                    $('.files .icons').append('<div class="icon"><i title="' + e.target.files[i].name.split('.')[1] + '"></i></div>');
                    $('.files .icons').addClass('active');
                    $('.files .btn-clear').addClass('active');
                }
            });
            $('.files .btn-clear').on('click', function () {
                document.querySelector(".files .input-file").value = "";
                $('.files .icons').removeClass('active');
                $(".files .icon").remove();
                $(this).removeClass("active");
            });
        });


        $("body").on('submit', '#form_queja', function (event) {

            event.preventDefault()
            if ($('#form_queja').valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#loading').show();
                //$('.btn-login').attr('disabled', true);

                var formData = new FormData(document.getElementById("form_queja"));

                $.ajax({
                    type: "POST",
                    url: "{{route('post_complaint.store')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,
                    success: function (respuesta) {

                        $('#loading').hide();

                        if (respuesta.status == 'success') {
                            showAlert(respuesta.message, respuesta.status);
                            setTimeout(function () {
                                window.location.href = "{{route('post_complaint.index')}}";
                            }, 2000);
                        }

                        if (respuesta.status == 'fail') {

                            if (respuesta.session) {
                                $(".modal-login").addClass("active");
                            } else {
                                showAlert(respuesta.message, respuesta.status);
                            }

                        }

                        setTimeout(function () {
                            $('.btn-login').attr('disabled', false);
                        }, 2000);
                    }
                });
            }
        });


        $("body").on('submit', '#form_login', function (event) {

            event.preventDefault()
            if ($('#form_login').valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#loading_login').show();
                $('.btn-login').attr('disabled', true);

                var formData = new FormData(document.getElementById("form_login"));

                $.ajax({
                    type: "POST",
                    url: "{{route('login_user')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,
                    success: function (respuesta) {

                        $('#loading_login').hide();

                        if (respuesta.status == 'success') {
                            $("#form_queja").submit();
                            $(".modal-login").removeClass("active");
                        }

                        if (respuesta.status == 'fail') {
                            showAlert(respuesta.message, respuesta.status);
                        }

                        setTimeout(function () {
                            $('.btn-login').attr('disabled', false);
                        }, 2000);
                    }
                });
            }
        });

    </script>
@endsection
