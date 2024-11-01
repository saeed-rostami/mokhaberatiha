@extends("admin.layout")

@section('content')
    <div class="content">
        <div class="main-content">
            <a href="{{ route('admin.society.create') }}" class="btn" style="background-color: cadetblue;color: aliceblue;margin: 2vh 0 2vh;">اضافه کردن انجمن</a>

            <div class="table__box">
                <table class="table">

                    <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>  عنوان نمایندگی</th>
                        <th> توضیحات نمایندگی</th>
                        <th>استان نمایندگی</th>
                        <th>شهر نمایندگی</th>
                        <th>کد نمایندگی</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($societies as $society)
                    <tr role="row" >
                        <td><a href="">{{$society->id}}</a></td>
                        <td><a href="">{{$society->name}}</a></td>
                        <td><a href="">{{\Illuminate\Support\Str::limit($society->description, 25)}}</a></td>
                        <td><a href="">{{$society->city->province->name}}</a></td>
                        <td><a href="">{{$society->city->name}}</a></td>
                        <td><a href="">{{$society->code}}</a></td>
                        <td>
                            <form action="{{ route('admin.society.delete' , $society) }}"  method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn item-delete mlg-15" title="حذف"></button>
                            </form>
{{--                           <button class="btn" title="ویرایش">--}}
{{--                               <a href="{{ route('post.edit', $post) }}" class="item-edit " ></a>--}}
{{--                           </button>--}}
                        </td>


                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $societies->links() }}

            </div>

        </div>
    </div>

@endsection

