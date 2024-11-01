@extends('website.layout')

@section('content')
<div class="container news-pa rent">

    <div class="container-fluid  news">
        <h2 class="text-center">
            پر بازدید ترین خبر ها
        </h2>
        @foreach($posts as $post)
            <div class="news-card">
                <div class="col-12">
                    <div class="post-box">
                        <a href="{{ route('post.single' , $post) }}">
                            <figure>
                                <img src="{{ asset('storage/'.$post->image()->path) }}" alt="">
                                <figcaption class="meta-fig">
                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>&nbsp;
                                    <span><i class="fa fa-comment-o"></i> 12</span>
                                </figcaption>
                                <figcaption class="view">
                                    <span>بخش ویژه</span>
                                    <span>انجمن</span>
                                    <span>اتاق خبر</span>
                                </figcaption>
                            </figure>
                            <div class="text-p">
                                <h5>{{ $post->title }}</h5>
                                <p>
                                    {{ \Illuminate\Support\Str::limit($post->description, 200) }}
                                </p>
                                <div class="text-rigt">
                                    <a href="{{ route('post.single' , $post) }}">ادامه ...</a></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{ $posts->links() }}

</div>

@endsection
