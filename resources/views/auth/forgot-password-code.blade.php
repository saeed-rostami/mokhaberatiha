@extends('website.layout' , ['title' => 'فراموشی رمز عبور'])

@section('content')
<div class="container main-container">
    <h1>لطفا کد ارسال شده را وارد کنید...</h1>
    <h2 class="text-indigo-600"> {{ $otp->otp }}</h2>

    <form method="post" class="d-flex justify-content-center" action="{{ route('verify.forgot.otp') }}" id="register-code-form">
        @csrf
        <input name="mobile" type="hidden" value="{{ $mobile }}">
        <div style="direction: ltr;">
            <input name="num_1" type="text" class="form-control otp-input" maxlength="1" required>
            <input name="num_2"  type="text" class="form-control otp-input" maxlength="1" required>
            <input name="num_3"  type="text" class="form-control otp-input" maxlength="1" required>
            <input name="num_4"  type="text" class="form-control otp-input" maxlength="1" required>

        </div>

        <div class="text-center mt-5 ">
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <button type="submit" class="btn varify">ورود به سایت</button>
        </div>
        <p>   یک رمز عبور تصادفی برای شما ایجاد و پیامک میشود</p>
    </form>
</div>

<br><br><br><br>
@endsection
