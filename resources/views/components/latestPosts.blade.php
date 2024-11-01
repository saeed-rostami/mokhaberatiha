<div class="latest-posts">
    <div class="container-fluid">
        <div class="blog-title-span">
            <span class="title">آخرین مطالب</span>
        </div>
       @foreach($posts as $post)
            <div class="col-md-3">
                <div class="post-box">
                    <a href="{{ route('post.single' , $post->id) }}">
                        <figure>
                            <img src="{{ asset('storage/'.$post->image()->path) }}" alt="">
                            <figcaption class="meta-fig">
                                <span><i class="fa fa-clock-o"></i> {{verta($post->created_at)->format('Y-m-d')}}</span>&nbsp;
                                <span><i class="fa fa-comment-o"></i> {{ $post->confirmedComments->count() }}</span>
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
                                {{ \Illuminate\Support\Str::limit($post->description, 150) }}
                            </p>
                            <div class="text-rigt">
                                <a href="{{ route('post.single' , $post) }}">ادامه ...</a></div>
                        </div>
                    </a>
                </div>
            </div>

       @endforeach
    </div>
</div>
