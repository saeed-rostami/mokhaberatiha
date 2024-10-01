@extends('website.layout')


@section('content')
    <div class="container main-container">
        <h1>لطفا کد ارسال شده را وارد کنید...</h1>
        @if ( $errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-indigo-600"> {{ $otp->otp }}</h2>
        <form method="post"  class="d-flex justify-content-center" action="{{ route('mobile.verification') }}">
            @csrf
            <input name="mobile" type="hidden" value="{{ $mobile }}">
            <div style="direction: ltr;">
                <input name="num_1" type="text" class="form-control otp-input" maxlength="1" required>
                <input name="num_2"  type="text" class="form-control otp-input" maxlength="1" required>
                <input name="num_3"  type="text" class="form-control otp-input" maxlength="1" required>
                <input name="num_4"  type="text" class="form-control otp-input" maxlength="1" required>

            </div>

            <div class="text-center mt-5 "></div>
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <button type="submit" class="btn varify">اعتبارسنجی</button>
        </form>
    </div>


    <br><br><br><br>

@endsection

@push('scripts')
    <script src="{{ asset("js/register-code.js") }}"></script>
@endpush
