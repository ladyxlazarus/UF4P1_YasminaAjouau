<!DOCTYPE html>
<html>

<head>
  <title>Trello Cards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<form action="{{ route('logout') }}" method="GET">
    @csrf
    <button type="submit">Logout</button>
</form>

<body>
<h1>My Trello Boards</h1>
@foreach($boards as $board)
    <a href="{{ route('cards.index', ['boardId' => $board->id]) }}" class="btn btn-success" style="margin-inline:3em">{{ $board->name }}</a>
@endforeach
</body>