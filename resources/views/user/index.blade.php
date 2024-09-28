<div>
    @foreach ($users as $user)
{{--        <div>--}}
{{--            <a href="{{ route('note.show', $user) }}">View</a>--}}
{{--            <a href="{{ route('note.edit', $user) }}">Edit</a>--}}
{{--            <form action="{{ route('note.destroy', $user) }}" method="POST">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit" onclick="return confirm('are you sure?');">delete</button>--}}
{{--            </form>--}}
{{--        </div>--}}
        {{ $user->email }}
{{--        <hr>--}}
    @endforeach

{{--    {{ $notes->links() }}--}}
</div>
