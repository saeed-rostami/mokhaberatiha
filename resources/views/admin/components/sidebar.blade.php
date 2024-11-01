<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="img/pro.jpg" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">ادمین مخابراتی ها</span>
    </div>

    <ul>
        <li class="item-li i-dashboard is-active"><a href="index.html">پیشخوان</a></li>
        <li class="item-li i-courses "><a href="{{ route('post.index') }}">اتاق اخبار</a></li>
        <li class="item-li i-users"><a href={{ route('user.index') }}> کاربران</a></li>
        <li class="item-li i-slideshow"><a href="{{ route('admin.society.index') }}">انجمن ها</a></li>
{{--        <li class="item-li i-ads"><a href="ads.html">تبلیغات</a></li>--}}
        <li class="item-li i-comments"><a href="{{ route('comment.index') }}"> نظرات</a></li>
{{--        <li class="item-li i-tickets"><a href="tickets.html"> تیکت ها</a></li>--}}
        <li class="item-li i-comments"><a href="{{ route('poll.index') }}"> نظرسنجی</a></li>
{{--        <li class="item-li i-notification__management"><a href="notification-management.html">مدیریت اطلاع رسانی</a>--}}
        </li>
{{--        <li class="item-li i-user__inforamtion"><a href="user-information.html">تماس با ما</a></li>--}}
        <li class="item-li i-categories"><a href="{{ route('settings.index') }}">درباره ما</a></li>

{{--        <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>--}}
    </ul>

</div>

<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <!-- <a class="" href="https://netcopy.ir"></a> -->
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <!-- <span class="account-balance font-size-12">موجودی : 2500,000 تومان</span> -->
            <div class="notification margin-15">
                <a class="notification__icon"></a>
                <div class="dropdown__notification">
                    <div class="content__notification">
                        <span class="font-size-13">موردی برای نمایش وجود ندارد</span>
                    </div>
                </div>
            </div>
            <a href="" class="logout" title="خروج"></a>
        </div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html" title="پیشخوان">پیشخوان</a></li>
        </ul>
    </div>
</div>

