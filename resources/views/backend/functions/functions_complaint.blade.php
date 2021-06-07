<script type='text/javascript'>

    $(document).ready(function () {
        $(".edit_register").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("reports_complaint.edit", ":id") }}';
            url = url.replace(':id', dataId);
            window.location.href = url;
        });

        $(".delete_register").on("click", function () {
            var dataId = $(this).attr("data-id");
            modalDelete(dataId);
        });

        $(".modal-complaint").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("reports_complaint.viewModalComplaint", ":id") }}';
            url = url.replace(':id', dataId);
            $('#modal-complaint').load(url, function (){
                $('#modal-description-complaint').modal('show');
            });
        });

        $(".download-file-complaint").on("click", function () {
            var dataId = $(this).attr("data-id");
            var url = '{{ route("reports_complaint.downloadFileComplaint", ":id") }}';
            url = url.replace(':id', dataId);
            window.location.href=url;
        });
    })


    $("body").on('submit', '#form_complaint', function (event) {

        event.preventDefault()
        if ($('#form_complaint').valid()) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#loading').show();
            $('.botones').attr('disabled', true);

            var formData = new FormData(document.getElementById("form_complaint"));

            $.ajax({
                type: "POST",
                url: "{{route('reports_complaint.update')}}",
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
</script>
