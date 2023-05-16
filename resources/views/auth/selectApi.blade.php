<!DOCTYPE html>
<html>

<head>
  <title>Practica 1 UF4 PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-auto">
        <form action="{{ route('logout') }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1>Select an API</h1>
    <div class="d-flex justify-content-center">
      <a href="{{ route('boards.show') }}" class="btn btn-primary mr-3">Trello API</a>
      <a href="{{ route('movies.indexShows') }}" class="btn btn-primary mr-3">TMDB API</a>
      <a href="{{ route('marvel.characters') }}" class="btn btn-primary">MARVEL API</a>
    </div>
  </div>
</body>

</html>
