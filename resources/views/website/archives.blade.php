@extends('website.layout')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($archives as $archive)
                <div class="news-card-2 m-a-res">
                    <div class="col-sm-12 col-md-3 col-3">
                        <div class="post-box">
                            <a href="{{ asset('storage/' . $archive->path) }}">
                                <figure>
                                    <img src="{{ asset('storage/' . $archive->path) }}" alt="">

                                    {{--                                <figcaption class="view">--}}
                                    {{--                                    <span>بخش ویژه</span>--}}
                                    {{--                                    <!-- <span>انجمن</span> -->--}}
                                    {{--                                    <span>اتاق خبر</span>--}}
                                    {{--                                </figcaption>--}}
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        {{ $archives->links() }}

    </div>


@endsection
