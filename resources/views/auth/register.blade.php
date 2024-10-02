@extends('website.layout')
<link rel="stylesheet" href="{{ asset('login.css') }}">

@section('content')
    <div class="container-fluid">
        <div class="col-6">
            @if ( $errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                method="POST"
            action="{{ route('register.store') }}"
            >
                @csrf
{{--                <div class="mb-3">--}}
{{--                    <label for="mobile" class="form-label">شماره تلفن</label>--}}
{{--                    <input name="mobile" type="mobile" class="form-control" id="mobile" aria-describedby="phoneHelp" placeholder="لطفا شماره تلفن خود را وارد کنید...">--}}
{{--                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->--}}
{{--                </div>--}}


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">آدرس ایمیل</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="لطفا ایمیل خود را وارد کنید...">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">گذرواژه</label>
                    <input name="password" type="password" class="form-control is-invalid password" id="validationServer03" aria-describedby="validationServer03Feedback"  placeholder="لطفا پسورد خود را وارد کنید..." required>
                </div>

                    <div class="col-auto">
               <span id="passwordHelpInline" class="form-text">
                  <p class="text-black-50  red"> گذرواژه باید بین 8 الی 20 کاراکتر باشد.</p>
                  </span>


                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">تائید گذرواژه</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="لطفا پسورد خود را وارد کنید...">
                    </div>


                    <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">ثبت نام</button>
            </form>
        </div>
    </div>

    <br><br><br><br>
@endsection

@push('scripts')
    <script src="{{ asset("js/register.js") }}"></script>
@endpush
