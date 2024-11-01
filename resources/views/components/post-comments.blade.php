<div class="container-fluid">
    <h2 class="text-center">
        کامنت های منتخب
    </h2>

    <div class="slider-part-parent">

        <div class="slider-part">
            <div class="list">
                @foreach( $comments as $c => $value)
                    @if(!$value->is_admin)
                        <div class="item1" style="--item-position: {{ $c }}">
                            <p>
                                کاربر {{ $value->user->mobile }} : {{ $value->comment }}
                            </p>

                            @if( $value->replied)
                                <p>
                                    پاسخ ادمین: {{ $value->replied->comment }}
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

    </div>
</div>

<br><br>
