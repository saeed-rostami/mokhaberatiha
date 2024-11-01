@extends('website.layout')

@section('content')
    <br>
    <br>

    <div id="call" class="call">
        <p style="margin-top: 1vh;">شماره تماس</p>
    </div>

    <div class="call-items animate__animated animate__fadeIn">
        <div class="items">
            <p style="margin-top: 1vh;">{{ $setting->mobile_number }}</p>
        </div>
    </div>


    <div class="socail">
        <!-- <img src="nav-icons/icons/diplom icon.png" alt="" class="menu-icons"> -->
        <p style="margin-top: 1vh;">شبکه های اجتماعی</p>
    </div>


    <div class="socail-items animate__animated animate__fadeIn">
        <div class="items">
            <p style="margin-top: 1vh;">{{ json_decode($setting->socials)->instagram }}</p>

        </div>
        <div class="items">
            <p style="margin-top: 1vh;">{{ json_decode($setting->socials)->telegram }}</p>
{{--            <p style="margin-top: 1vh;">{{ json_decode($setting->socials)->whatsapp }}</p>--}}
        </div>

    </div>


    <div id="address" class="address">
        <p style="margin-top: 1vh;">آدرس</p>
    </div>

    <div class="address-items animate__animated animate__fadeIn">
        <div class="items">
            <p style="margin-top: 1vh;">{{ $setting->address }}</p>
        </div>
    </div>

    <br>
    <br>
@endsection
