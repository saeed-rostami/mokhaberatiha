@extends("admin.layout")

@section('content')
<div class="table__box">
    <table class="table">
        <thead role="rowgroup">
        <tr role="row" class="title-row">
            <th>عنوان کامنت</th>
            <th>پاسخ ادمین</th>
            <!-- <th>متن خبر</th> -->
            <!-- <th>سطح کاربری</th> -->

            <!-- <th>درحال یادگیری</th> -->
            <!-- <th>وضعیت حساب</th> -->
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <tr role="row" class="">
            <td>
                <a href="">کامنت 1</a>
            </td>
            <form method="post" action="{{ route('send.response.comment', $comment) }}">
                @csrf
                <td>
                    <textarea name="reply" id=""msg cols="30" rows="5" class="form-control" style="resize: none; height: 120px !important;" placeholder="متن پاسخ..."></textarea></td>

                <td>

                    <button type="submit" class="btn item-confirm mlg-15 text-success" title="تایید"></button>
                </td>
            </form>
        </tr>

        </tbody>
    </table>
</div>
@endsection('content')
