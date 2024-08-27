@extends('dashboard.layout')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid flex">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error" style="margin-right: auto;margin-left: auto;" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">صفحه یافت نشد</p>
            <p class="text-gray-500 mb-0">به نظر میاد از ماتریکس خارج شده اید!</p>
            <a href="{{ route("dashboard.index") }}">&larr; بازگشت به داشبورد</a>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
