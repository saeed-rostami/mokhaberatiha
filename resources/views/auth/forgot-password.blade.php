@extends('website.layout' , ['title' => 'فراموشی رمز عبور'])

@section('content')
    <div class="container">
        <form method="post" action="{{ route('sendForgotOTP') }}" id="phone-get-form">
            @csrf
            <label class="form-label">
                <h3>
                    شماره تماس خود را وارد کنید...
                </h3>
            </label>
            <div class="get-phone-inp">
                <input type="text" name="mobile" id="" class="form-control" required placeholder="09.........">
            </div>
            <button type="submit" class="btn varify">ارسال کد اعتبارسنجی</button>
        </form>
        @include('components.errors')

    </div>

    <br><br><br><br>
@endsection
