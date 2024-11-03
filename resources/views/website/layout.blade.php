<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <title> {{ $title ?? '' }} </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('register-code.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://kit.fontawesome.com/a585edefbc.js" crossorigin="anonymous"></script>

{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">--}}
{{--    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">--}}
{{--    <meta name="msapplication-TileColor" content="#da532c">--}}
{{--    <meta name="theme-color" content="#ffffff">--}}
</head>

<body>

@include( 'components.top_bar' )

@includeWhen( $banner ?? false, 'components.banner' ,['banner' => 'true'])

@include( 'components.main_header' )

@yield('content')

@include( 'components.footer' )

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/index.js"></script>



@stack('scripts')
</body>

</html>
