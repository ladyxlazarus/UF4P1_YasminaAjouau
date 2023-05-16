<!DOCTYPE html>
<html>

<head>
  <title>Trello Cards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
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
    <h1 class="mt-4 mb-4">New Trello Card</h1>
    <form method="POST" action="{{ route('cards.store') }}">
      @csrf
      <input type="hidden" name="idBoard" value="{{ $idBoard }}">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
      </div>
      <div class="form-group">
        <label for="dueDate">Due Date:</label>
        <input type="date" class="form-control" name="dueDate">
      </div>
      <button type="submit" class="btn btn-success">Create card</button>
      <a href="{{ route('boards.show') }}" class="btn btn-primary">Go back to boards</B></a>
    </form>
  </div>
</body>

</html>