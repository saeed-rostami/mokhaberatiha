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
            @include('components.errors')
            <tr role="row" class="">
                <form method="post" action="{{ route('poll.update') }}">
                    <input type="hidden" value="{{ $poll->id }}" name="poll_id">
                    @csrf
                    <td>
                        <input value="{{ $poll->title }}" name="title" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="نام نظرسنجی..."></td>


                    <td>
                        <input value="{{ $poll?->items[0]->title }}" name="old_item_1" type="hidden" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 1 نظرسنجی...">
                        <input value="{{ $poll?->items[0]->title }}" name="item_1" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 1 نظرسنجی...">

                        <input value="{{ $poll?->items[1]->title }}"  name="old_item_2" type="hidden" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 2 نظرسنجی...">
                        <input value="{{ $poll?->items[1]->title }}"  name="item_2" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 2 نظرسنجی...">

                        <input value="{{ $poll?->items[2]?->title ?? '' }}" name="old_item_3" type="hidden" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 3 نظرسنجی...">
                        <input value="{{ $poll?->items[2]?->title ?? '' }}" name="item_3" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 3 نظرسنجی...">


                        <input value="{{ $poll?->items[3]?->title ?? '' }}" name="old_item_4" type="hidden" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 4 نظرسنجی...">
                        <input value="{{ $poll?->items[3]?->title ?? '' }}" name="item_4" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="گزینه 4 نظرسنجی...">
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
