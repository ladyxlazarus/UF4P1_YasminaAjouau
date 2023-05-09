@foreach($boards as $board)
    <a href="{{ route('cards.index', ['boardId' => $board->id]) }}">{{ $board->name }}</a><br>
@endforeach