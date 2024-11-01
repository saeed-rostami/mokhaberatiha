@extends('admin.layout')

@section('content')
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form method="post" action="{{route('settings.store')}}">
                @csrf
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="img/pro.jpg" class="avatar___img">
                        <input type="file" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">ادمین مخابراتی ها</span>
                </div>
                <input  name="email" class="text text-left" placeholder="ایمیل" value="{{ $setting?->email}}">
                <input name="mobile_number" class="text text-left" placeholder="شماره موبایل" value="{{ $setting?->mobile_number}}">
                <input name="phone_numbers" class="text text-left" placeholder="تلفن" value="{{ $setting?->phone_numbers}}">
                <input name="address" class="text text-left" placeholder="آدرس" value="{{ $setting?->address}}">
                <input name="instagram" class="text text-left" placeholder=" اینستاگرام" value="{{ json_decode($setting?->socials)?->instagram}}">
                <input name="telegram" class="text text-left" placeholder=" تلگرام" value="{{ json_decode($setting?->socials)?->telegram}}">
                <input name="whatsapp" class="text text-left" placeholder=" واتس اپ" value="{{ json_decode($setting?->socials)?->whatsapp}}">
                <!-- <p class="input-help text-left margin-bottom-12" dir="ltr">
                    https://netcopy.ir/tutors/
                    <a href="https//netcopy/tutors/"></a>
                </p> -->
                <!-- <input class="text text-left" placeholder="رمز عبور">
                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p> -->
                <br>
                <textarea name="about_text" class="text" placeholder="درباره من مخصوص ادمین">
                    {{ $setting?->about_text}}
                </textarea>
                <br>
                <br>
                <button type="submit" class="btn btn-netcopy_net">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
@endsection
