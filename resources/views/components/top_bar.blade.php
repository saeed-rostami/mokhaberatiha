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
                    {{ auth()->user()->mobile }}

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
                    <button class="btn"><li><a href="{{route('mobile.otpForm')}}">ثبت نام</a></li></button>
                    <p id="date" style="width:60%;direction: ltr;margin-top: 2vh;">
                        {{ verta()->format('Y/m/d') }}
                    </p>

                </div>
            @endguest
        </div>


    </div>
</div>
