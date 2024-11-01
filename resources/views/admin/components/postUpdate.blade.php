@extends("admin.layout")

@section('content')
<div class="table__box">
    <table class="table">
        <thead role="rowgroup">
        <tr role="row" class="title-row">
            <th>عکس خبر</th>
            <th>تایتل خبر</th>
            <th>متن خبر</th>
            <!-- <th>سطح کاربری</th> -->

            <!-- <th>درحال یادگیری</th> -->
            <!-- <th>وضعیت حساب</th> -->
            <th>ارسال اعلان</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <tr role="row" class="">
                <td>  <input type="file" id="img" name="file" accept="image/*">
                    <img style="width: 50px; height: 50px" src="{{ asset('storage/' . $post?->image()?->path) }}" alt="">
                </td>
                <td><input value="{{ $post->title }}" name="title" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="نام خبر..."></td>
                <td><textarea  name="description" id="description" cols="30" rows="5" class="form-control" style="resize: none; height: 120px !important;" placeholder="متن خبر...">{{ $post->description }}
                    </textarea></td>
                <td><input value="{{ $post->notif }}" name="notif" type="checkbox" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;"></td>

                <!-- <td>5 دوره</td> -->
                <!-- <td class="text-success">تاییده شده</td> -->
                <td>
                    <!-- <a href="" class="item-delete mlg-15" title="حذف"></a> -->
                    <button  type="submit" class="item-confirm mlg-15 text-success"  title="تایید"></button>
                    <!-- <a href="" class="item-reject mlg-15" title="رد"></a> -->
                    <!-- <a href="edit-user.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a> -->
                    <!-- <a href="edit-user.html" class="item-edit " title="ویرایش"></a> -->
                </td>
            </tr>
        </form>

        </tbody>
    </table>
</div>
@endsection
