@extends('frontend.layouts.master', ['class_body' => 'register'])
@section('content')
    <div class="breadcrumbs">
        <a href="#">Inicio »</a>
        <span>Regístrate</span>
    </div>

    <main class="main">
        <div class="content">
            <h1 class="title">Únete hoy <img src="{{ asset('asset/frontend/assets/img/logo.svg')}}" alt="dequr"></h1>
            <div class="flex">
                <div class="social-login">
                    <a href="#" class="social-facebook"><img src="{{ asset('asset/frontend/assets/img/icons/facebook.svg')}}" alt="facebook"> Continuar con Facebook</a>
                    <a href="#" class="social-google"><img src="{{ asset('asset/frontend/assets/img/icons/google.svg')}}" alt="google"> Continuar con Google</a>
                    <a href="#" class="social-twitter"><img src="{{ asset('asset/frontend/assets/img/icons/twitter.svg')}}" alt="twitter"> Continuar con Twitter</a>
                </div>
                <div class="box-register">
                    <form action="#">
                        <div class="wrap-input">
                            <label>Correo electrónico</label>
                            <input type="email" name="" id="">
                        </div>
                        <div class="wrap-input">
                            <label>Contraseña</label>
                            <input type="password" name="" id="">
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn-register">Regístrate</button>
                            <div class="accept-terms">
                                <input type="checkbox" name="" id="terms" required="true">
                                <label for="terms"><span>Acepto los <a href="#">Términos, Condiciones y Políticas</a> de Dequr</span></label>
                            </div>
                        </div>
                        <p class="login">¿Ya tienes una cuenta? <a href="{{route('login')}}">Inicia sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script type="text/javascript">
        $("body").on('submit', '#login', function (event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            event.preventDefault()
            if ($('#login').valid()) {

                $('#loading').show();
                $('.btn-form').attr('disabled', true);

                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('login_user') }}",
                    dataType: "json",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function (respuesta) {

                        if (respuesta.exito == 1) {
                            window.location.href = "{{ route('backend') }}";
                        }
                        if (respuesta.error == 1) {
                            $('#loading').hide();
                            toastr.options.timeOut = 2000;
                            toastr.error('Error los datos son incorrectos');
                            setTimeout(function () {
                                $('.btn-form').attr('disabled', false);
                            }, 2000);
                        }
                    }
                });
            }
        });
    </script>
@endsection