<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hello Pets</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">   --}}

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{url('lib/flaticon/font/flaticon.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/login.css')}}" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet">
    <link href="{{url('css/home.css')}}" rel="stylesheet">
    <link href="{{url('css/products.css')}}" rel="stylesheet">

    <!-- Login Template --->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    {{-- <x-notification /> --}}
    <x-topbar />
    <x-navbar />
    <div class="{{session()->has('username') ? 'whole_container' : ''}}">
        @if(session()->has('username'))
            <x-my-profile />
        @endif
        <div class="{{session()->has('username') ? 'main_box' : ''}}">
            <x-error />
            <x-login />
            @if(!session()->has('username') && Request::path() !== 'view-posts' && (Request::path() == '' || Request::path() == '/'))
                <x-hero />
            @endif
            @yield('main_content')
            <x-footer />
        </div>
    </div>
    <x-back-to-top />
    <x-scripts />
</body>

</html>