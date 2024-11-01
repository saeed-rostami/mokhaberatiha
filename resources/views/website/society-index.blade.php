@extends('website.layout')

@section('content')
    <div class="news-main-page">
        <div class="news-main-sidebar">
{{--            <a href="" class="is-active">گیلان</a>--}}
            @foreach($provinces as $province)
                <a  href="{{ route('website.societies' , $province->id) }}" >{{ $province->name }}</a>
            @endforeach
        </div>
        <div class="news-main-cards">
            <div class="sidebar-guilan">
                <h1>نمایندگی های استان {{$societies[0]?->city->province->name ?? "یافت نشد"}}</h1>

             @foreach($societies as $society)
                    <br>
                    <h3>نمایندگی {{$society->city->name}}</h3>
                    <br>
                    <p>
                        {{$society->name}}
                    </p>
                    <hr>
             @endforeach
            </div>
        </div>
    </div>
@endsection
