@php
    $settingApp = UtilsHelp::settingApp();
@endphp


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{ $settingApp->deskripsi_pengaturan }}" />
    <meta name="keywords" content="{{ $settingApp->deskripsi_pengaturan }}" />
    <meta name="author" content="{{ $settingApp->namaaplikasi_pengaturan }}" />
    <link rel="icon" type="image/x-icon"
        href="{{ asset('upload/setting/' . $settingApp->logoaplikasi_pengaturan) }}" alt="Logo Aplikasi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Site Title -->
    <title>@yield('title')</title>
    <!-- Site favicon -->

    <!-- Light-box -->
    <link rel="stylesheet" href="{{ asset('template/Dojek_v1.0.0/HTML') }}/css/mklb.css" type="text/css" />

    <!-- Swiper js -->
    <link rel="stylesheet" href="{{ asset('template/Dojek_v1.0.0/HTML') }}/css/swiper-bundle.min.css" type="text/css" />

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template/Dojek_v1.0.0/HTML') }}/css/materialdesignicons.min.css" />

    <link rel="stylesheet" href="{{ asset('template/Dojek_v1.0.0/HTML') }}/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template/Dojek_v1.0.0/HTML') }}/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('library/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-2.0.0/css/dataTables.bootstrap5.css') }}">
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/sweetalert2/dist/sweetalert2.min.css') }}">

    @stack('custom_css')
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
    <!--Navbar Start-->
    @include('layouts.app.frontend.navbar')
    <!-- Navbar End -->

    <!-- home-agency start -->
    @yield('content')
    <!-- home-agency end -->

    <!-- footer & cta start -->
    @include('layouts.app.frontend.footer')
    <!-- footer & cta end -->

    <!-- Back to top -->
    <a href="{{ asset('template/Dojek_v1.0.0/HTML') }}/#" onclick="topFunction()" class="back-to-top-btn btn btn-dark"
        id="back-to-top"><i class="mdi mdi-chevron-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- javascript -->
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Portfolio filter -->
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/filter.init.js"></script>
    <!-- Light-box -->
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/mklb.js"></script>
    <!-- swiper -->
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/swiper-bundle.min.js"></script>
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/swiper.js"></script>

    <!-- counter -->
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/counter.init.js"></script>
    <script src="{{ asset('template/Dojek_v1.0.0/HTML') }}/js/app.js"></script>

    <script src="{{ asset('library/datatables/datatables.js') }}"></script>
    <script src="{{ asset('library/datatables/DataTables-2.0.0/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('library/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('js/utils/index.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('custom_js')
</body>

</html>
