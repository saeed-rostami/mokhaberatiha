@extends('website.layout' , ['title' => 'ثبت نام'])
{{--<link rel="stylesheet" href="{{ asset('login.css') }}">--}}

@section('content')
    <div class="container">
        @include( 'components.errors' )
        <form method="post" action="{{ route('mobile.sendOtp') }}" id="phone-get-form">
            @csrf
            <label class="form-label">
                <h3>
                    شماره تماس خود را وارد کنید...
                </h3>
            </label>
            <div class="get-phone-inp">
                <input type="text" name="mobile" id="mobile" class="form-control" required placeholder="09.........">
            </div>
            <button type="submit" class="btn varify">ارسال کد اعتبارسنجی</button>
        </form>
    </div>

    <br><br><br><br>
@endsection

@push('scripts')
    <script src="{{ asset("js/register-code.js") }}"></script>
@endpush
