<!DOCTYPE html>
<html>

<head>
  <title>Trello Cards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Trello Cards</h1>
    <div style="margin-bottom:3em;">
      <a href="{{ route('cards.create', ['boardId' => $boardId]) }}" class="btn btn-primary">Create New Card</a>
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
            <a href="{{ route('cards.edit', $card['id']) }}">✏️</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>