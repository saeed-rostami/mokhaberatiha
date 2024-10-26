@extends('admin.layout')

@section('content')
    <div class="main-content font-size-13">
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی کاربر">
                        <div class="t-header-search-content ">
                            <input type="text"  class="text"  placeholder="ایمیل">
                            <input type="text"  class="text" placeholder="شماره">
                            <input type="text"  class="text" placeholder="استان">
                            <input type="text"  class="text margin-bottom-20" placeholder="نام و نام خانوادگی">
                            <btutton class="btn btn-netcopy_net">جستجو</btutton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره موبایل</th>
                    <!-- <th>سطح کاربری</th> -->
                    <th>تاریخ عضویت</th>
                    <th>استان</th>
                    <!-- <th>درحال یادگیری</th> -->
                    <!-- <th>وضعیت حساب</th> -->
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                <tr role="row" class="">
                    <td>{{$user->id}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->email ?? 'ندارد'}}</td>

                    <td>{{$user->mobile}}</td>

                    <!-- <td>کاربر عادی</td> -->
                    <td>{{$user->created_at}}</td>

                    <td>{{$user->city?->province?->name ?? "ندارد"}}</td>
                    <!-- <td>5 دوره</td> -->
                    <!-- <td class="text-success">تاییده شده</td> -->
                    <td>
                        <a href="" class="item-delete mlg-15" title="حذف"></a>
                        <!-- <a href="" class="item-confirm mlg-15" title="تایید"></a> -->
                        <!-- <a href="" class="item-reject mlg-15" title="رد"></a> -->
                        <a href="edit-user.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                        <!-- <a href="edit-user.html" class="item-edit " title="ویرایش"></a> -->
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
