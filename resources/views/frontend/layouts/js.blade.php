<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{ asset('asset/backend/plugins/toastr/toastr.min.js')}}"></script>

<!-- JS -->
<script src="{{ asset('asset/frontend/assets/js/slick-min.js')}}"></script>
<script src="{{ asset('asset/frontend/assets/js/custom/main-min.js')}}"></script>
<script src="{{ asset('asset/frontend/assets/js/lightbox-min.js')}}"></script>
<script type="application/javascript">

    function showAlert(text, option) {

        if (option == 'success') {
            toastr.success(text)
        }

        if (option == 'fail') {
            toastr.error(text)
        }
    }
    $('.featured-opinions .carousel').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        swipeToSlide: true,
        arrows: false,
        dots: false,
        draggable: true,
        autoplay: true,
        speed: 1000,
        centerMode: true,
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                }
            }
        ]
    });
</script>
