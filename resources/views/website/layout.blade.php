<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('register-code.css') }}">
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
        <div class="top-cat-box">
            <div class="menu">
                <img src="favicon/android-chrome-192x192.png" alt="">
                <p>مخابراتی ها</p>

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
        <div class="log_reg_btn_parent">
            @auth()
           <div>
               خوش آمدید
               {{auth()->user()->name}}

             <form METHOD="get" action="{{ route('logout') }}">
                 @csrf

                 <button>
                     <button type="submit" class="btn btn-primary">خروج</button>

                 </button>
             </form>
           </div>
            @endauth
            @guest()
                <div class="log_reg_btn">
                    <button class="btn"><li><a href="{{route('login')}}">ورود</a></li></button>
                    <button class="btn"><li><a href="{{route('register')}}">ثبت نام</a></li></button>
                    <p id="date" style="width:60%;direction: ltr;margin-top: 2vh;"></p>

                </div>
                @endguest
        </div>


    </div>
</div>

<div class="main-header">
    <div class="container-fluid">
        <div class="col-md-7 col-sm-8">
            <div class="main-menu">
                <ul>
                    <li><a href="#">اتاق خبر</a></li>
                    <!-- <li><a href="#">اقتصادی</a></li> -->
                    <li><a href="#">انجمن</a></li>
                    <li><a href="#">آرشیو تصاویر </a></li>
                    <li><a href="#">قوانین و دستورالعمل ها</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-5 col-sm-4">
            <div class="search-btn">
                <input type="text" class="form-control" placeholder="جستجو...">
                <span><i class="fa fa-search"></i></span>
            </div>
        </div>

    </div>
</div>

@yield('content')

<div class="footer">
    <div class="container-fluid">
        <div class="col-md-5">
            <div class="footer-box">
                <span class="title">مجله seo90</span>
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
                <p><i class="fa fa-phone"></i> 09028468446</p>
                <p><i class="fa fa-phone"></i> 09336636892</p>
                <p><i class="fa fa-envelope-o"></i> info@seo90.ir</p>
                <p><i class="fa fa-map-marker"></i> تبریز </p>
                <div class="socialbox">
                    <p><a href="#"><i class="fa fa-twitter"></i></a></p>
                    <p><a href="#"><i class="fa fa-facebook"></i></a></p>
                    <p><a href="#"><i class="fa fa-instagram"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear-fix"></div>
<div class="end-wrapper">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="copy-r">
                <p>&copy; تمامی حقوق متعلق به بخت آزما می باشد</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="creator text-left">
                <p>طراحی سایت ، بخت آزما</p>
            </div>
        </div>
    </div>
</div>
<div class="bg"></div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/index.js"></script>
@stack('scripts')
</body>

</html>
