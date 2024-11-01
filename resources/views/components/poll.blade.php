<div class="top-sidebar-r">
    <span class="title">نظرسنجی</span>
    <!-- <a href="#"> -->
    @auth()
        @if($poll->userIsVoted())
            تشکر از ثبت نظر شما
        @else
            <form method="post" action="{{ route('poll-user.vote') }}">
                @csrf
                <input type="hidden" value="{{ $poll->id}}" name="poll_id">
                <div class="bx">
                    <h4> {{ $poll->title }}</h4>
                    <hr>

                    @foreach($poll->items as $item)

                        <div class="col-md-12">
                            <div class="img-box">
                                <div class="form-check">
                                    <input
                                        value="{{ $item->id }}"
                                        class="form-check-input" type="radio" name="item_id" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{ $item->title  }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{--        <div class="comment_btn">--}}
                <button role="button" type="submit" class="btn btn-block btn-info">
                    <p>
                        ثبت نظر
                    </p>
                </button>
                {{--        </div>--}}
            </form>

            @include('components.errors')
        @endif
    @endauth



</div>
