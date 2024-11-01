@extends("admin.layout")

@section('content')
    <div class="container">
        <div>
            <h4>{{ $poll->title }}</h4>
            <h6>
                تعداد نظرهای ثبت شده : {{ $poll->userVotes->count() }}
            </h6>
        </div>
        <hr>
        @foreach( $items as $item)
            <h6>{{ $item->title }}</h6>

            <span>
             {{ $item->userItems->count() }}
            </span>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                     style="width: {{$item->statis()}}%" aria-valuenow="{{ $item->userItems->count() }}"
                     aria-valuemin="0" aria-valuemax="100">

                    {{ $item->statis()}} %
                </div>
            </div>

        @endforeach
    </div>
@endsection
