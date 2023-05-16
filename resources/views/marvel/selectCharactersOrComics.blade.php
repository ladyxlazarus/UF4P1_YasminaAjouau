<!DOCTYPE html>
<html>

<head>
  <title>MARVEL API</title>
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
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div>
      <a href="{{ route('marvel.characters') }}" class="btn btn-primary">VIEW CHARACTERS</a>
      -OR-
      <a href="{{ route('marvel.comics') }}" class="btn btn-primary">VIEW COMICS</a>
    </div>
  </div>
</body>

</html>
