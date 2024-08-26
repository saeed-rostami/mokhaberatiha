<a href="{{ route('note.index') }}">GO BACK</a>
<div>
    <h1> note added </h1>
    @if(session()->has('message'))
        <small>
            {{session()->get('message')}}
        </small>
    @endif
    <h1>{{ $note->note }}</h1>
</div>
