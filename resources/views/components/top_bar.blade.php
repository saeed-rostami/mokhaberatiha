{{----}}
<div class="top-bar">
    <div class="menu">
        <img src="favicon/android-chrome-192x192.png" alt="">
        <p>مخابراتی ها</p>

    </div>
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
            <p id="date" style="width:50%;direction: ltr;margin-top: 2vh;">
            {{ verta()->format('Y/m/d') }}
        </div>
    @endauth
    @guest()
        <div class="log_reg_btn">

            <a href="{{route('login')}}" class="btn" role="button"><button class="btn">ورود</button></a>

            <p id="date" style="width:50%;direction: ltr;margin-top: 2vh;">
                {{ verta()->format('Y/m/d') }}
            </p>

        </div>
    @endguest

</div>
