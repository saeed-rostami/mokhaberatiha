@extends("admin.layout")

@section('content')
    <div class="content">
        <div class="main-content">
            <!-- <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="courses.html">لیست دوره ها</a>
                    <a class="tab__item" href="approved.html">دوره های تایید شده</a>
                    <a class="tab__item" href="new-course.html">دوره های تایید نشده</a>
                    <a class="tab__item" href="create-new-course.html">ایجاد دوره جدید</a>
                </div>
            </div> -->
            <div class="bg-white padding-20">
                <div class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <div class="t-header-searchbox font-size-13">
                            <div type="text" class="text search-input__box ">جستجوی اخبار</div>
                            <div class="t-header-search-content ">
                                <input type="text"  class="text"  placeholder="نام اخبار">
                                <input type="text"  class="text" placeholder="ردیف">
                                <!-- <input type="text"  class="text" placeholder="قیمت"> -->
                                <!-- <input type="text"  class="text" placeholder="نام مدرس"> -->
                                <input type="text"  class="text margin-bottom-20" placeholder="دسته بندی">
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
                        <th>صفحه</th>
                        <th>عنوان</th>
                        <!-- <th>مدرس دوره</th> -->
                        <!-- <th>قیمت (تومان)</th> -->
                        <th>جزئیات</th>
                        <!-- <th>تراکنش ها</th> -->
                        <th>نظرات</th>
                        <!-- <th>تعداد دانشجویان</th> -->
                        <!-- <th>تعداد تایید</th> -->
                        <!-- <th>درصد مدرس</th> -->
                        <!-- <th>وضعیت دوره</th> -->
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr role="row" >
                        <td><a href="">1</a></td>
                        <td><a href="">1</a></td>
                        <td><a href="">{{$post->title}}</a></td>
                        <!-- <td><a href="">صیاد</a></td> -->
                        <!-- <td>60,000</td> -->
                        <!-- <td><a href="course-detail.html" class="color-2b4a83">مشاهده</a></td> -->
                        <td><a href="course-transaction.html" class="color-2b4a83" >مشاهده</a></td>
                        <td><a href="" class="color-2b4a83" >مشاهده (10 نظر)</a></td>
                        <!-- <td>120</td> -->
                        <!-- <td>تایید شده</td> -->
                        <!-- <td>70%</td> -->
                        <!-- <td>درحال برگزاری</td> -->
                        <td>
                            <a href="" class="item-delete mlg-15" title="حذف"></a>
                            <!-- <a href="" class="item-reject mlg-15" title="رد"></a> -->
                            <!-- <a href="" class="item-lock mlg-15" title="قفل دوره"></a> -->
                            <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                            <a href="" class="item-confirm mlg-15" title="تایید"></a>
                            <a href="" class="item-edit " title="ویرایش"></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
