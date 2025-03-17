<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aesthetic Template">
    <meta name="keywords" content="Aesthetic, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" type="text/css">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    @include('frontend.layouts.header-menu')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('frontend.layouts.header')
    <!-- Header Section End -->

    @yield('content')
    <!-- Footer Section Begin -->
    @include('frontend.layouts.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend')}}/js/masonry.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/main.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                width: '300px', // Adjust the width to make the alert smaller
                height:'150px',
                padding: '1rem' // Adjust the padding to make the alert smaller
            });
        @endif
    </script>
</body>

</html>