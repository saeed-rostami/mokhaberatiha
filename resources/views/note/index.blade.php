<div>
    <a href="{{ route('note.create') }}">Add New Note</a>
    <hr>
</div>
<div>
    @foreach ($notes as $note)
        <div>
            <a href="{{ route('note.show', $note) }}">View</a>
            <a href="{{ route('note.edit', $note) }}">Edit</a>
            <form action="{{ route('note.destroy', $note) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('are you sure?');">delete</button>
            </form>
        </div>
        {{ Str::words($note->note, 30) }}
        <hr>
    @endforeach

    {{ $notes->links() }}
</div>
