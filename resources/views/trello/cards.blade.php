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
  <div class="container">
    <h1>My Trello Cards</h1>
    <div style="margin-bottom:3em;">
      <a href="{{ route('cards.create', ['boardId' => $boardId]) }}" class="btn btn-success">Create New Card</a>
      <a href="{{ route('boards.show') }}" class="btn btn-primary">View boards</B></a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>NAME</th>
          <th>DESCRIPTION</th>
          <th>ID</th>
          <th>ID BOARD</th>
          <th>SHORT URL</th>
          <th>DUE DATE</th>
          <th>EDIT</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cards as $card)
        <tr>
          <td>{{ $card['name'] }}</td>
          <td>{{ $card['desc'] }}</td>
          <td>{{ $card['id']}}</td>
          <td>{{ $card['idBoard'] }}</td>
          <td><a href="{{ $card['shortUrl'] }}" target="_blank">{{ $card['shortUrl'] }}</a></td>
          <td>{{ $card['due'] ?? 'sin definir' }}</td>
          <td>
          <a href="{{ route('cards.edit', ['id' => $card['id']]) }}">✏️</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>