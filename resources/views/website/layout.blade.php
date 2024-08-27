<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<div class="top-bar">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="">
                <img style="width: 10%;" src="img/logo2.png" alt="logo">
                <span style="margin-right: 20px; color:#070478; font-size: 16px">
                        مخابراتی ها
                    </span>
            </div>
            {{-- <div class="search-btn">
                <span><i class="fa fa-search"></i></span>
            </div> --}}
        </div>
        <div class="col-md-6">
            <div class="top-cat-box">
                <div class="col-md-12">
                    <div class="menu">
                        <ul>
                            <li>{{ \Morilog\Jalali\Jalalian::now() }}
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                 <div class="show-cat">
                     <span>
                         دسته ها
                         <i class="fa fa-bars"></i>
                     </span>
                 </div>
                 </div> -->
            </div>
        </div>
    </div>
</div>
<div class="main-header">
    <div class="container-fluid">
        <div class="col-md-10">
            <div class="main-menu">
                <ul>
                    <li><a href="#">اتاق خبر</a></li>
                    <li><a href="#">انجمن ها</a></li>
                    <li><a href="#">قوانین و بخشنامه ها</a></li>
                    <li><a href="#">عضویت</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">درباره ما</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">

            <div class="social-box">
                <ul>
                    <li>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        داشبورد
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        ورود
                                    </a>
                                    ||
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            ثبت نام
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
@yield('content')
<div class="footer">
    <div class="container-fluid">
        <div class="col-md-5">
            <div class="footer-box">
                <span class="title">مجله مخابراتی ها</span>
                <p>متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید
                    سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی از
                    صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم
                    تولید سادگی از صنعت متن ساختگی بام تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید
                    سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن سادگی نامفهوم تولید
                    سادگی از صنعت
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="footer-box">
                <span class="title">دسترسی سریع</span>
                <ul>
                    <li><a href="#">موضوعی</a></li>
                    <li><a href="#">قوانین</a></li>
                    <li><a href="#">نشریات</a></li>
                    <li><a href="#">موضوعی</a></li>
                    <li><a href="#">خبرنامه</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <div class="footer-box">
                <span class="title">موضوعی</span>
                <ul>
                    <li><a href="#">موضوعی</a></li>
                    <li><a href="#">قوانین</a></li>
                    <li><a href="#">نشریات</a></li>
                    <li><a href="#">موضوعی</a></li>
                    <li><a href="#">خبرنامه</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="footer-box contact-box">
                <span class="title">تماس با ما</span>
                <p><i class="fa fa-phone"></i> 09332187732</p>
                <p><i class="fa fa-phone"></i> 09118395667</p>
                <p><i class="fa fa-envelope-o"></i> info@مخابراتی ها.ir</p>
                <p><i class="fa fa-map-marker"></i> رشت </p>
            </div>
        </div>
        <div class="clear-fix"></div>
    </div>
</div>
<div class="end-wrapper">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="copy-r">
                <p>&copy; تمامی حقوق متعلق به مخابراتی ها می باشد</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="creator text-left">
                <p>طراحی سایت: شرکت <a href="https://keytotec.com/">بخت آزما</a></p>
            </div>
        </div>
    </div>
</div>
<div class="bg"></div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/index.js"></script>
</body>

</html>
