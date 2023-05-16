<!DOCTYPE html>
<html>

<head>
  <title>Trello Cards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-between">
          <a href="{{ route('selectApi') }}" class="btn btn-primary">GO BACK API MENU</a>
          <form action="{{ route('logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="mb-4">My Trello Boards</h1>
    <div>
      @foreach($boards as $board)
      <a href="{{ route('cards.index', ['boardId' => $board->id]) }}" class="btn btn-success" style="margin-inline:3em">{{ $board->name }}</a>
      @endforeach
    </div>
  </div>
</body>

</html>