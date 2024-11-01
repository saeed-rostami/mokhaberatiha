<div class="footer">
    <div class="container-fluid">
        <div class="col-md-5">
            <div class="footer-box">
{{--                <span class="title">مجله seo90</span>--}}
                <p>
                    {{$setting->about_text}}
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
                <p><i class="fa fa-mobile"></i> {{ $setting->mobile_number}}</p>
                <p><i class="fa fa-phone"></i> {{ $setting->phone_numbers}}</p>
                <p><i class="fa fa-envelope-o"></i> {{ $setting->email}}</p>
                <p><i class="fa fa-map-marker"></i> {{ $setting->address}} </p>
                <div class="socialbox">
                    <p><a href="#"><i class="fa fa-telegram"></i>
{{--                            {{ json_decode($setting->socials)->telegram}}--}}
                        </a></p>
                    <p><a href="#"><i class="fa fa-instagram">
{{--                                {{ json_decode($setting->socials)->instagram}}--}}
                            </i></a></p>
                    <p><a href="#"><i class="fa fa-whatsapp">
{{--                                {{ json_decode($setting->socials)->whatsapp}}--}}
                            </i></a></p>
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
