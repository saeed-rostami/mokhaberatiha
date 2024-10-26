<div class="main-header">
    <div class="container-fluid">
        <div class="col-md-7 col-sm-8">
            <div class="main-menu">
                <ul>
                    @if( request()->route()->getName() !== 'website.index')
                        <li><a href="{{route('website.index')}}"><p>صفحه اصلی </p></a></li>
                    @endif
                        <li><a href="{{route('website.news')}}"><p>اتاق خبر</p></a></li>
                    <!-- <li><p href="#">اقتصادی</p></li> -->
                    <li>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                انجمن ها
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">استان ها</a></li>
                                <li><a class="dropdown-item" href="#">نمایندگی استان ها</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>

                    </li>
                    <li><p href="#">آرشیو تصاویر </p></li>
                    <li><p href="#">قوانین و دستورالعمل ها</p></li>
                    <li><p href="#">درباره ما</p></li>
                    <li><p href="#">تماس با ما</p></li>
                    <li><a href="{{ route('mobile.otpForm') }}"><p class="text-center">عضویت</p></a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-5 col-sm-4">
            <div class="search-btn">
                <input type="text" class="form-control" placeholder="جستجو...">
                <span style="margin-top: 1.5vh;"><i class="fa fa-search"></i></span>
            </div>
        </div>

    </div>
</div>
