<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KMobile Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('img/user.jpg') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- Toastr css --}}
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    {{-- Common css --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @stack('style')
</head>

<body>
    {{-- Header --}}
    @include('layouts.user.header')

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            {{-- Sidebar --}}
            @include('layouts.user.sidebar')

            {{-- Navbar --}}
            @include('layouts.user.navbar')
        </div>
    </div>
    <!-- Navbar End -->

    {{-- Content --}}
    @yield('content')

    @include('layouts.user.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('plugins/easing/easing.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/user/main.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        const lang = @json( __('content') );
        // for success - green box
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    @stack("scripts")
</body>

</html>