<script type='text/javascript'>

    $(document).ready(function () {
        $(".edit_register").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("busines.edit", ":id") }}';
            url = url.replace(':id', dataId);
            window.location.href = url;
        });

        $(".delete_register").on("click", function () {
            var dataId = $(this).attr("data-id");
            modalDelete(dataId);
        });
    });

    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadForm + img').remove();
                $('#uploadForm').after('<img src="' + e.target.result + '" width="150" height="150"  style="border-radius: 90px!important; margin:auto; border:1px solid #eaeaea' +'"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function () {
        $('#logo-busines').hide();
        filePreview(this);
    });


    function refresh() {
        window.location.href = "{{ route('business') }}";
    }

    $("body").on('submit', '#form_busines', function (event) {

        event.preventDefault()
        if ($('#form_busines').valid()) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#loading').show();
            $('.botones').attr('disabled', true);

            var formData = new FormData(document.getElementById("form_busines"));
            var route = $("input[name='route']").val();

            $.ajax({
                type: "POST",
                url: route,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: formData,
                success: function (respuesta) {

                    $('#loading').hide();
                    showAlert(respuesta.alert, respuesta.status);

                    if (respuesta.create) {
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }

                    if (respuesta.update) {
                        setTimeout(function () {
                            refresh();
                        }, 2000);
                    }

                    setTimeout(function () {
                        $('.botones').attr('disabled', false);
                    }, 2000);
                }
            });
        }
    });

    function modalDelete(id) {
        $('#id_eliminar').val(id);
        $('#modal-danger').modal('show');
    }

    function deleteData() {

        var id = $('#id_eliminar').val();
        var rutaController = "{{ route('busines.destroy') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: rutaController,
            cache: false,
            dataType: 'json',
            data: {id: id},
            success: function (respuesta) {

                if (respuesta.status == 'success') {
                    $('#contenidomodal').hide();
                    $('#modal-danger').modal('hide');
                    refresh();
                }
                if (respuesta.status == 'fail') {
                    MensajeForm('error_sql');
                }
            }
        });
    }
</script>
