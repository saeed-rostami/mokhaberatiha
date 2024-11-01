@extends('website.layout' , ['title' => 'ورود'])
@section('content')
    <div class="container news-container owl-carousel">
        <img src="{{ asset('img/6640354_23171.jpg') }}" alt="">
        <img src="{{ asset('img/6640358_23175.jpg') }}" alt="">
        <img src="{{ asset('img/5602400_21007.jpg') }}" alt="">


    </div>

    <div class="news-text container">
        <h1>{{ $post->title }}</h1>
        <p>
            {{ $post->description }}
        </p>


        <form method="post" action="{{ route('comment.store') }}" id="algin-form">
            @csrf
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <label for="message">کامنت</label>
                <textarea name="comment" id="" msg cols="30" rows="5" class="form-control" style="resize: none;"
                          placeholder="نظر خود را ثبت کنید..."></textarea>
            </div>

            <div class="form-group">
                <button type="submit" id="post" class="btn bg-primary"> ثبت نظر</button>
            </div>
        </form>
        @include('components.errors')

    </div>


    <br><br><br><br>



    @includeWhen($post->confirmedComments, 'components.post-comments' , ['comments' => $post->confirmedComments])
@endsection
