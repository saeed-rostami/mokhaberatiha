@extends('website.layout' , ['title' => 'تکمیل اطلاعات'])
<link rel="stylesheet" href="{{ asset('login.css') }}">

@section('content')
    <div class="container-fluid">
        <div class="col-6">
            @include( 'components.errors' )

            <form method="post" action="{{ route('register.store') }}" class="register-form">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">نام کاربری</label>
                    <input name="username" type="username" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                           placeholder="لطفا نام کاربری خود را وارد کنید..." required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>

                <div class="name-parent">
                    <div class="mb-3" style="width: 45%;">
                        <label for="first_name" class="form-label">نام کوچک</label>
                        <input name="first_name" type="first_name" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                               placeholder="لطفا نام خود را وارد کنید..." required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <div class="mb-3" style="width: 47%;">
                        <label for="last_name" class="form-label">نام خانوادگی</label>
                        <input name="last_name" type="last_name" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                               placeholder="لطفا نام خانوادگی خود را وارد کنید..." required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">آدرس ایمیل</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="لطفا ایمیل خود را وارد کنید..." required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>

                <!-- province -->
                <div class="mb-3">
                    <label for="province" class="form-label">استان</label>
                    <select id="province" name="province" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                            required>
                        <option class="form-control" value="">انتخاب استان</option>
                        @foreach ($provinces as $info)
                            <option value="{{ $info['id'] }}">{{ $info['name'] }}</option>
                        @endforeach

                    </select>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <!-- city -->
                <div class="mb-3">
                    <label for="city"  class="form-label"/>
                    <select id="city" class="form-control"  name="city"
                            required autofocus autocomplete="city">
                        <option name="city" class="form-control" value="">انتخاب شهر</option>
                    </select>
                    {{-- <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                        required autofocus autocomplete="city" /> --}}
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    {{-- @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>


                <div class="mb-3">
                    <label for="address" class="form-label">آدرس</label>
                    <input name="address" type="text" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                           placeholder="لطفا آدرس خود را وارد کنید..." required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">گذرواژه</label>
                    <input name="password" type="password" class="form-control is-invalid password" id="validationServer03"
                           aria-describedby="validationServer03Feedback" placeholder="لطفا پسورد خود را وارد کنید..."
                           required>

                    <div class="col-auto">
               <span id="passwordHelpInline" class="form-text">
                  <p class="text-black-50  red"> گذرواژه باید بین 8 الی 20 کاراکتر باشد.</p>
                  </span>


                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">تائید گذرواژه</label>
                    <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1"
                           placeholder="لطفا پسورد خود را وارد کنید..." required>
                </div>


                <!-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->

                <button type="submit" class="btn">ثبت نام</button>


                <!-- <a href="register-code.html" class="btn" role="button" type="submit">ثبت نام</a> -->
            </form>
        </div>
    </div>

    <br><br><br><br>
@endsection

@push('scripts')
    <script src="{{ asset("js/register.js") }}"></script>
@endpush

{{--<script src="https://code.jquery.com/jquery-3.7.1.min.js"--}}
{{--        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>--}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#province').change(function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/get_city/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        $('#city').empty().prop('disabled', false);
                        $('#city').append('<option value="">انتخاب شهر</option>');
                        $.each(data, function(key, city) {
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    }
                })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        console.error("Error: " + textStatus + " - " + errorThrown);
                    });

            } else {
                $('#city').empty().prop('disabled', true);
            }
        });
    });
</script>
