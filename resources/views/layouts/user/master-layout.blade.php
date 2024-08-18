<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kmobile Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
    <script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/user/main.js') }}"></script>
    @stack("scripts")
</body>

</html>