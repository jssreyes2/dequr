<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{ asset('asset/backend/plugins/toastr/toastr.min.js')}}"></script>

<!-- JS -->
<script src="{{ asset('asset/frontend/assets/js/slick-min.js')}}"></script>
<script src="{{ asset('asset/frontend/assets/js/custom/main-min.js')}}"></script>
<script src="{{ asset('asset/frontend/assets/js/lightbox-min.js')}}"></script>
<script src="{{ asset('asset/backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script type="application/javascript">

    function showAlert(text, option) {

        if (option == 'success') {
            toastr.success(text)
        }

        if (option == 'fail') {
            toastr.error(text)
        }
    }
</script>
