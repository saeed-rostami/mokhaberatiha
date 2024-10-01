@extends('website.layout')

<link rel="stylesheet" href="{{ asset('login.css') }}">
@section('content')
    <div class="container-fluid">
        <div class="col-6">
            <form method="POST" action="{{ route('mobile.verification') }}">
                @csrf
                <input name="mobile" type="hidden" value="{{ $mobile }}">
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleInputmobile1" class="form-label">آدرس ایمیل</label>--}}
{{--                    <input name="mobile" type="mobile" class="form-control" id="mobile" aria-describedby="mobileHelp"--}}
{{--                           placeholder="لطفا ایمیل خود را وارد کنید...">--}}
{{--                    <!-- <div id="mobileHelp" class="form-text">We'll never share your mobile with anyone else.</div> -->--}}
{{--                </div>--}}
                <div class="mb-3">
                    <label for="exampleInputcode1" class="form-label">گذرواژه</label>
                    <input name="code" type="code" class="form-control" id="code"
                           placeholder="لطفا پسورد خود را وارد کنید...">
                </div>
                <div class="col-auto">
        <span id="codeHelpInline" class="form-text">
           <p class="text-black-50"> گذرواژه باید بین 8 الی 20 کاراکتر باشد.</p>
          </span>
                </div>
                <!-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <br><br><br><br>
@endsection
