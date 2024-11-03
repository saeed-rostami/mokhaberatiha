{{--<div class="main-header">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="col-md-7 col-sm-8">--}}
{{--            <div class="main-menu">--}}
{{--                <ul>--}}
{{--                    @if( request()->route()->getName() !== 'website.index')--}}
{{--                        <li><a href="{{route('website.index')}}"><p>صفحه اصلی </p></a></li>--}}
{{--                    @endif--}}
{{--                    @if( request()->route()->getName() !== 'website.news')--}}
{{--                        <li><a href="{{route('website.news')}}"><p>اتاق خبر</p></a></li>--}}
{{--                    @endif--}}
{{--                        <li><a href="{{ route('website.societies') }}"><p>انجمن ها</p></a></li>--}}
{{--                        <li id="society-res-hide">--}}
{{--                            <div class="dropdown">--}}
{{--                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">--}}
{{--                                    انجمن ها--}}
{{--                                </a>--}}

{{--                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                    <li class="dropstart">--}}
{{--                                        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">استان ها</a>--}}
{{--                                        <ul class="dropdown-menu">--}}
{{--                                            <li>--}}
{{--                                                <a href="" class="dropdown-item">تهران</a>--}}
{{--                                                <a href="" class="dropdown-item">گیلان</a>--}}
{{--                                                <a href="" class="dropdown-item">اصفهان</a>--}}
{{--                                                <a href="society.html" class="dropdown-item" style="display: flex; justify-content: space-between; align-items: center;">--}}
{{--                                                    <i class="fa-solid fa-arrow-left-long"></i>--}}
{{--                                                    مشاهده کامل--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    <li><a href="{{ route('website.archives') }}"><p class="text-center">آرشیو تصاویر</p></a></li>--}}
{{--                    <li><p href="#">قوانین و دستورالعمل ها</p></li>--}}
{{--                    <li><a href="{{ route('about-us') }}"><p class="text-center">درباره ما</p></a></li>--}}
{{--                    <li><a href="{{ route('contact-us') }}"><p class="text-center">تماس با ما</p></a></li>--}}


{{--                        @if( request()->route()->getName() !== 'mobile.otpForm')--}}
{{--                            <li><a href="{{ route('mobile.otpForm') }}"><p class="text-center">عضویت</p></a></li>--}}
{{--                        @endif--}}

{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-5 col-sm-4">--}}
{{--            <div class="search-btn">--}}
{{--                <input type="text" class="form-control" placeholder="جستجو...">--}}
{{--                <span style="margin-top: 1.5vh;"><i class="fa fa-search"></i></span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

<div class="main-header">
    <div class="container-fluid">
        <div class="col-md-7 col-sm-8">
            <div class="responsive-menu" style="width: 100%;">
                <div class="responsive-menu-top" style="display: flex; align-items: center; justify-content: space-between;">
                    <i class="fa-solid fa-bars"></i>
                    <div class="search-btn-respon">
                        <input type="text" class="form-control" placeholder="جستجو...">
                    </div>
                    <a href="Login.html" class="btn" role="button"><button class="btn">ورود</button></a>
                    <!-- <button class="btn"><li><a>ثبت نام</a></li></button> -->
                </div>
            </div>
            <div class="main-menu">
                <ul>

                    @if( request()->route()->getName() !== 'website.index')
                        <li><a href="{{route('website.index')}}"><p>صفحه اصلی </p></a></li>
                    @endif
                    @if( request()->route()->getName() !== 'website.news')
                        <li><a href="{{route('website.news')}}"><p>اتاق خبر</p></a></li>
                    @endif
                    <li><a href="{{ route('website.societies') }}"><p>انجمن ها</p></a></li>

                    <li><a href="{{ route('website.archives') }}"><p class="text-center">آرشیو تصاویر</p></a></li>
                    <li><a href="{{ route('about-us') }}"><p class="text-center">درباره ما</p></a></li>
                    <li><a href="{{ route('contact-us') }}"><p class="text-center">تماس با ما</p></a></li>
                    <li><a href="{{ route('mobile.otpForm') }}"><p class="text-center">عضویت</p></a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-5 col-sm-4">
            <div class="search-btn">
                <input type="text" class="form-control" placeholder="جستجو...">
                <span style="margin-top: 1.5vh;"><i class="fa fa-search"></i>
            </div>
        </div>

    </div>
</div>
