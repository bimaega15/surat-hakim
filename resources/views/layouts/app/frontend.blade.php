@php
    $settingApp = UtilsHelp::settingApp();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Surat Hakim" name="keywords">
    <meta content="{{ $settingApp->deskripsi_pengaturan }}" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('upload/setting/' . $settingApp->logoaplikasi_pengaturan) }}"
        type="image/x-icon">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-2.0.0/css/dataTables.bootstrap5.css') }}">

    <style>
        .icon_surat {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .title_surat {
            font-size: 12px;
            margin-top: 14px;
            color: #000;
            font-weight: bold;
            text-align: center;
        }

        .card_surat {
            height: 200px;
            overflow: hidden;
        }

        .card_area {
            height: 500px;
            overflow-y: scroll;
        }
    </style>
    @stack('custom_css')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    @include('layouts.app.frontend.navbar')
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    @include('layouts.app.frontend.modalSearch')
    <!-- Modal Search End -->

    <!-- About Start -->
    @yield('content')

    <!-- Modal Video -->
    @include('layouts.app.frontend.modalVideo')
    <!-- About End -->

    <!-- Copyright Start -->
    @include('layouts.app.frontend.copyright')
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('library/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('library/jquery-validation-1.19.5/dist/jquery.validate.js') }}"></script>

    <script src="{{ asset('js/utils/index.js') }}"></script>
    <script src="{{ asset('js/modal/index.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('library/datatables/datatables.js') }}"></script>
    <script src="{{ asset('library/datatables/DataTables-2.0.0/js/dataTables.bootstrap5.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>


    @stack('custom_js')
</body>

</html>
