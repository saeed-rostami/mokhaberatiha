@extends("admin.layout")

@section('content')
    <div class="main-content">
{{--        <div class="tab__box">--}}
{{--            <div class="tab__items">--}}
{{--                <a class="tab__item is-active" href="comments.html"> همه نظرات</a>--}}
{{--                <a class="tab__item " href="comments.html">نظرات تاییده نشده</a>--}}
{{--                <a class="tab__item " href="comments.html">نظرات تاییده شده</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>ارسال کننده</th>
                    <th>برای</th>
                    <th>دیدگاه</th>
                    <th>تاریخ</th>
                    {{--                    <th>تعداد پاسخ ها</th>--}}
                    <th>وضعیت</th>
                    <th>عملیات</th>
                    <th>پاسخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr role="row">
                        <td><a href="">{{$comment->id}}</a></td>
                        <td><a href="">{{$comment->is_admin ? "ادمین" : $comment->user->mobile}}</a></td>
                        <td><a href="">{{$comment->post->title}} </a></td>
                        <td>{{$comment->comment}}</td>
                        <td>{{verta($comment->created_at)->format('Y-m-d')}}</td>
                        {{--                    <td>13</td>--}}
                        <td class="text-success">{{$comment->is_confirmed}}</td>
                        <td>
{{--                            <a href="" class="item-delete mlg-15" title="حذف"></a>--}}
                            <form method="post" action="{{route('comment.reject', $comment->id) }}">
                                @csrf
                                    <button type="submit" class="btn item-reject mlg-15" title="رد">
                                    </button>

                            </form>

                            <form method="post" action="{{route('comment.approve', $comment->id) }}">

                                @csrf
                                <button type="submit" class="btn item-confirm mlg-15" title="تایید">
                                </button>

                            </form>


                        </td>

                        <td>
                            <a title="پاسخ" href="{{route('response.comment', $comment)}}">
                                <button class="btn item-edit mlg-15" >
                                </button>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {{ $comments->links() }}

        </div>

    </div>

@endsection
