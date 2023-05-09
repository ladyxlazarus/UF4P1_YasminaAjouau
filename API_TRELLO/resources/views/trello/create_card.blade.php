<!DOCTYPE html>
<html>
<head>
  <title>Trello Cards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
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
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</body>
</html>