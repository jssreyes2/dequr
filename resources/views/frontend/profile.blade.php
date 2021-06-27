@extends('frontend.layouts.master', ['class_body' => 'profile'])
@section('content')
    <div class="breadcrumbs">
        <a href="{{route('principal')}}">Inicio »</a>
        <span>Mi perfil</span>
    </div>

    <main class="main">
        <div class="content">

            <form role="form" id='form_user_photo' name='form_user_photo' enctype="multipart/form-data">
                <div class="left">
                    <div class="wrap-image">


                        @if(isset($user) and !empty($user->avatar))
                            <div class="image">
                                <img src="{{ asset('storage/photo_users/' .$user->avatar)}}" alt="imagen de perfil" id="imgPreview">
                            </div>
                        @else
                            <div style="border-radius: 50%;padding: 2px;border: 1px solid #ccc;">
                                <img src="{{ asset('asset/frontend/assets/img/avatar-user.png')}}" alt="imagen de perfil" id="imgPreview" style="border-radius: 50%;">
                            </div>
                        @endif


                        <label class="upload" style="padding: 7px;">
                            <input type="file" id="avatar" name="avatar" accept="image/x-png,image/gif,image/jpeg">
                        </label>
                    </div>
                    <div class="member-date">
                        Miembro desde <span>{{isset($user) ? date('d/m/Y', strtotime($user->created_at)): date('d/m/y')}}</span>
                    </div>
                    <div class="buttons">
                        <a href="{{route('Notification.index')}}" class="btn-notifications">Notificaciones</a>
                        <a href="{{route('comment.index')}}" class="btn-comments">Mis comentarios</a>
                        <a href="#" class="btn-delete-account">Eliminar cuenta</a>
                    </div>
                </div>
            </form>


            <div class="right">
                <h2 class="title-user-data">Datos del usuario</h2>
                <div class="user-data">
                    <form role="form" id='form_user_profile' name='form_user_profile'>
                        <div class="flex">
                            <div class="input-wrap">
                                <label>Nombre</label>
                                <input type="text" name="firstname" id="firstname" class="required" value="{{isset($user) ? ucwords(mb_strtolower($user->firstname)) : ''}}">
                            </div>
                            <div class="input-wrap">
                                <label>Apellido</label>
                                <input type="text" name="lastname" id="lastname" class="required" value="{{isset($user) ? ucwords(mb_strtolower($user->lastname)) : ''}}">
                            </div>
                        </div>
                        <div class="input-wrap">
                            <label>Correo</label>
                            <input type="text" name="email" id="email" class="required email" value="{{isset($user) ? $user->email : ''}}">
                        </div>

                        <div class="input-wrap" id="loading-profile" style="display: none;">
                            <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}'/>
                        </div>

                        <span class="btn-edit">Editar</span>
                        <button type="submit" class="btn-save">Guardar</button>
                    </form>
                </div>


                <h2 class="title-change-password">Cambiar contraseña</h2>
                <div class="change-password">
                    <form role="form" id='form_user_password' name='form_user_password'>
                        <div class="input-wrap">
                            <label>Nueva contraseña </label>
                            <input type="password" name="password" id="password" class="required" placeholder="Ingrese su nueva contraseña">
                        </div>
                        <div class="input-wrap">
                            <label>Confirmar contraseña</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="required" placeholder="Repita la nueva contraseña">
                        </div>

                        <div class="input-wrap" id="loading-password" style="display: none;">
                            <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}'/>
                        </div>

                        <button type="submit" class="btn-save">Guardar contraseña</button>
                    </form>
                </div>
            </div>

        </div>
    </main>



    <!-- Modal inicio de sesión -->
    <div class="modal-login">  <!-- Asignar clase "active" a este div para mostrar la modal -->
        <div class="content">
            <div class="box">
                <span class="btn-close">X</span>

                <h2 class="title">Estas segur@ de eliminar la cuenta en<img src="{{asset('asset/frontend/assets/img/logo.svg')}}" alt="dequr"></h2>

                <div class="wrap-login text-center">
                    <form role="form" id='form_login' name='form_login'>
                        <img src="{{asset('asset/frontend/assets/img/cerrar_cuenta.png')}}" alt="cerrar cuenta" style="width:30%; margin: auto">
                        <button class="btn-login btn-close-account">Si, Cerrar Cuenta</button>
                        <div class="input-wrap" id="loading-close-account" style="display: none;">
                            <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}' style="margin: auto;"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="application/javascript">

        $("#avatar").change(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = new FormData(document.getElementById("form_user_photo"));

            $.ajax({
                type: "POST",
                url: "{{route('profile.updateAvatar')}}",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: formData,
                success: function (respuesta) {

                    if (respuesta.status == 'success') {
                        showAlert(respuesta.message, respuesta.status);
                    }

                    if (respuesta.status == 'fail') {
                        showAlert(respuesta.message, respuesta.status);
                    }
                }
            });
        });

        @if(isset($user) and !empty($user->avatar))
        avatar();
        @endif

        // Cargar imagen del perfil
        function readURL(input, imgControlName) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(imgControlName).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function avatar() {
            var imgControlName = "#imgPreview";
            readURL("{{asset('storage/photo_users/' .$user->avatar)}}", imgControlName);
            //$('.btn-remove-image').addClass('active');
            $('.image').addClass('active');
            $('.image .name').addClass('hide');
            $('.image #imgPreview').addClass('show');
        }

        $("#avatar").change(function () {
            var imgControlName = "#imgPreview";
            readURL(this, imgControlName);
            //$('.btn-remove-image').addClass('active');
            $('.image').addClass('active');
            $('.image .name').addClass('hide');
            $('.image #imgPreview').addClass('show');
        });


        /*$(".btn-remove-image").click(function(e) {
            e.preventDefault();
            $("#img-upload").val("");
            $('.image').removeClass('active');
            $('.image .name').removeClass('hide');
            $('.image #imgPreview').removeClass('show');
            $('.btn-remove-image').removeClass('active');
        });*/

        // Editar campos del form
        $(".user-data .btn-edit").click(function () {
            $("#form_user_profile").submit();
        });

        $(".btn-delete-account").click(function () {
            $(".modal-login").addClass("active");
        });


        $(".user-data .btn-save").click(function () {
            $("#form_user_profile").submit();
        });

        $(".btn-close").click(function () {
            location.reload();
        });


        $("body").on('submit', '#form_user_profile', function (event) {

            event.preventDefault()
            if ($('#form_user_profile').valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#loading-profile').show();
                $('.btn-edit').attr('disabled', true);

                var formData = new FormData(document.getElementById("form_user_profile"));

                $.ajax({
                    type: "POST",
                    url: "{{route('profile.updateProfile')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,
                    success: function (respuesta) {

                        $('#loading-profile').hide();
                        showAlert(respuesta.alert, respuesta.status);

                        if (respuesta.status == 'success') {
                            setTimeout(function () {
                                refresh();
                            }, 2000);
                        }

                        setTimeout(function () {
                            $('.btn-edit').attr('disabled', false);
                        }, 2000);
                    }
                });
            }
        });


        $("body").on('submit', '#form_user_password', function (event) {

            event.preventDefault()
            if ($('#form_user_password').valid()) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#loading-password').show();
                $('.btn-save').attr('disabled', true);

                var formData = new FormData(document.getElementById("form_user_password"));

                $.ajax({
                    type: "POST",
                    url: "{{route('profile.updatePassword')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,
                    success: function (respuesta) {

                        $('#loading-password').hide();
                        showAlert(respuesta.alert, respuesta.status);

                        if (respuesta.status == 'success') {
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }

                        setTimeout(function () {
                            $('.btn-save').attr('disabled', false);
                        }, 2000);
                    }
                });
            }
        });


        $(".btn-close-account").click(function () {

            $('#loading-close-account').show();
            $.post("{{route('profile.closeAccount')}}");
        });

    </script>
@endsection
