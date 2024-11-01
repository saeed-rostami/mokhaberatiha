@extends("admin.layout")

@section('content')
    <a href=" {{ route('poll.create') }}" class="btn" style="background-color: cadetblue;color: aliceblue;margin: 2vh 0 2vh;">اضافه کردن نظرسنجی</a>


    <span class="badge bg-danger text-danger">
        فقط یک نظر سنجی میتواند فعال باشد
    </span>

    <div class="table__box">
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th>شناسه</th>
                <th>نام نظرسنجی</th>
{{--                <th>استان</th>--}}
{{--                <th>نظر</th>--}}
{{--                <th>کاربر</th>--}}
                <!-- <th>تاریخ عضویت</th> -->
                <!-- <th>استان</th> -->
                <!-- <th>درحال یادگیری</th> -->
                <!-- <th>وضعیت حساب</th> -->
                <th>Activation</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($polls as $poll)

            <tr role="row" class="">
                <td><a href="">{{ $poll->id }}</a></td>
                <td>{{ $poll->title }}</td>
{{--                <td>رشت</td>--}}
{{--                <td>4</td>--}}
                <!-- <td>کاربر عادی</td> -->
{{--                <td>کاربر 3</td>--}}
                <!-- <td>3</td> -->
                <!-- <td>5 دوره</td> -->
                <!-- <td class="text-success">تاییده شده</td> -->
                <td>
                    <a class="btn btn-{{ $poll->is_active ? "danger" : "success"}}" href="{{route('poll.activation' , $poll)}}">

                        {{ $poll->is_active ? "غیر فعال کردن" : "فعال سازی"}}
                    </a>
                </td>

                <td>
                    <a href="{{ route('poll.edit' , $poll) }}" class="item-edit mlg-15" title="ویرایش"></a>
                    <form method="post" action="{{ route('poll.delete', $poll) }}">
                        @csrf
                        <button type="submit" class="btn item-delete mlg-15" title="حذف"></button>
                    </form>
                    <a href="{{ route('poll.statistic' , $poll) }}" class="item-eye mlg-15" title="آمار"></a>
                    <!-- <a href="" class="item-confirm mlg-15" title="تایید"></a> -->
                    <!-- <a href="" class="item-reject mlg-15" title="رد"></a> -->
                    <!-- <a href="edit-user.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a> -->
                    <!-- <a href="edit-user.html" class="item-edit " title="ویرایش"></a> -->
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $polls->links() }}
    </div>
@endsection
