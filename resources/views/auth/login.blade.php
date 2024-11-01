@extends('website.layout' , ['title' => 'ورود'])

{{--<link rel="stylesheet" href="{{ asset('login.css') }}">--}}

@section('content')
    <div class="container-fluid">
        <div class="col-6">
            @include( 'components.errors' )

            <form method="post" class="login-form" action="{{route('login.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">شماره تماس </label>
                    <input name="mobile" type="tel" class="form-control" id="exampleInputuser1" aria-describedby="userHelp" placeholder="لطفا شماره تماس خود را وارد کنید..." style="direction: rtl;">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">گذرواژه</label>
                    <input name="password" type="password" class="form-control password" id="exampleInputPassword1" placeholder="لطفا پسورد خود را وارد کنید...">
                </div>
                <div class="col-auto">
               <span id="passwordHelpInline" class="form-text">
                  <p class="red"> گذرواژه باید بین 8 الی 20 کاراکتر باشد.</p>
                  </span>
                </div>

                <div class="col-auto extra-text-parent">
               <span id="passwordHelpInline" class="form-text forget-password">
                  <p class="text-black-50">
                  <a href="{{ route('forgotOTPForm') }}">فراموشی رمزعبور</a>
                  </p>
                  </span>

                    <span id="passwordHelpInline" class="form-text checkbox">
                     <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                     <label class="form-check-label" for="check2">مرا به خاطر بسپار</label>
                     </span>
                </div>

                <!-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">ورود</button>
            </form>
        </div>
    </div>
@endsection
