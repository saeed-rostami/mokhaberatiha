{{----}}
{{--<div class="top-bar">--}}
{{--    <div class="menu">--}}
{{--        <img src="favicon/android-chrome-192x192.png" alt="">--}}
{{--        <p>مخابراتی ها</p>--}}

{{--    </div>--}}
{{--</div>--}}
{{--<div class="log_reg_btn_parent">--}}
{{--    @auth()--}}
{{--        <div class="log_reg_btn">--}}
{{--            خوش آمدید--}}
{{--            {{ auth()->user()->mobile }}--}}

{{--            <form METHOD="get" action="{{ route('logout') }}">--}}
{{--                @csrf--}}

{{--                <button>--}}
{{--                    <a href="{{ route('logout') }}" type="submit" class="btn btn-primary">خروج</a>--}}

{{--            <a href="{{route('logout')}}" class="btn" role="button"><button class="btn">خروج</button></a>--}}

{{--                </button>--}}
{{--            </form>--}}
{{--            <p id="date" style="width:50%;direction: ltr;margin-top: 2vh;">--}}
{{--            <p id="date" style="width:50%;direction: ltr;margin-top: 2vh;">--}}
{{--                {{ verta()->format('Y/m/d') }}--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    @endauth--}}
{{--    @guest()--}}
{{--        <div class="log_reg_btn">--}}

{{--            <a href="{{route('login')}}" class="btn" role="button"><button class="btn">ورود</button></a>--}}

{{--            <p id="date" style="width:50%;direction: ltr;margin-top: 2vh;">--}}
{{--                {{ verta()->format('Y/m/d') }}--}}
{{--            </p>--}}

{{--        </div>--}}
{{--    @endguest--}}

{{--</div>--}}

<div class="top-bar">

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

    <div class="log_reg_btn_parent">
        <div class="log_reg_btn">

            @guest()
                <a href="{{route('login')}}" class="btn" role="button"><button class="btn">ورود</button></a>
            @endguest

            @auth()
                <a href="{{route('logout')}}" class="btn" role="button"><button class="btn">خروج</button></a>
            @endauth
            <!-- <button class="btn"><li><a>ثبت نام</a></li></button> -->
            <p style="width:50%;direction: ltr;margin-top: 2vh;">
                {{ verta()->format('Y/m/d') }}
            </p>
        </div>
    </div>



</div>
