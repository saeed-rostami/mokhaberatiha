<div>
    <form action="{{ route('note.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="note" id="note" cols="30" rows="10">{{ $note->note }}</textarea>
        <button type="submit">update</button>
    </form>
</div>
