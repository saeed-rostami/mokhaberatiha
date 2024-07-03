<div>
    <form action="{{ route('note.store') }}" method="POST">
        @csrf
        <textarea name="note" id="note" cols="30" rows="10" placeholder="متن اطلاعیه را وارد نمایید"></textarea>
        <button type="submit">ثبت اطلاعیه</button>
    </form>
</div>
