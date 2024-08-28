@extends('dashboard.layout')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 text-center">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">ثبت اطلاعیه جدید</h1>
                            </div>
                            <form method="POST" action="{{ route('notice.store') }}" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input name="title" type="text" class="form-control form-control-user" id="exampleFirstName"
                                               placeholder="تیتر">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input name="content" type="text" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="متن اطلاعیه">
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    ایجاد اطلاعیه جدید
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
