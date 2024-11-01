@extends('website.layout')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">
            درباره ما
        </h2>
        <div class="news-card container" id="news-card">
            <div class="col-12">
                <div class="post-box" id="post-box">
                    <a href="#">
                        <figure>
                            <img src="img/5602400_21007.jpg" alt="">
                        </figure>
                        <div class="text-p2" id="text-p">
                            <h3>پیشینه و سوابق مخابراتی ها</h3>
                        </div>
                        <p> {{ $setting->about_text }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
