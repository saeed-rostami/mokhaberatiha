@extends("admin.layout")

@section('content')
    <div class="table__box">
        @include( 'components.errors' )

        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th>تایتل نظرسنجی</th>
                <th>گزینه های نظرسنجی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr role="row" class="">
                <form method="post" action="{{ route('poll.store') }}">
                    @csrf
                    <td>
                        <input name="title" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="نام نظرسنجی..."></td>


                    <td><input  name="item_1" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 1 نظرسنجی...">
                        <input  name="item_2" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 2 نظرسنجی...">
                        <input  name="item_3" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 3 نظرسنجی...">
                        <input  name="item_4" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 4 نظرسنجی...">
                    </td>

                    <td>

                        <button type="submit"  class="btn item-confirm mlg-15 text-success" title="تایید"></button>

                    </td>
                </form>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
