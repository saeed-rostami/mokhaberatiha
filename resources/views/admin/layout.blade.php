<html>

<head>
    <title>پنل مدیریت </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive_768.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive_991.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')  }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

@include("admin.components.sidebar")

@yield('content')


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
{{--<script src="js/owl.carousel.min.js"></script>--}}
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

@stack('scripts')
</body>

</html>
