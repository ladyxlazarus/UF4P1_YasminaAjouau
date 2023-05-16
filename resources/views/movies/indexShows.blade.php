<!DOCTYPE html>
<html>

<head>
    <title>THE MOVIE DATABASE API</title>
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
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="{{ route('movies.indexMovies') }}" class="btn btn-primary">Movies</a>
                <a href="{{ route('movies.indexShows') }}" class="btn btn-primary">Shows</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="my-4">Shows</h1>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @else
        @if (isset($serie))
        <h1>{{ $serie->name }}</h1>
        @if($serie->overview !== '')
        <p>{{ $serie->overview }}</p>
        @else
        <p>undefined</p>
        @endif
        <a href="{{ route('movies.indexShows') }}" class="btn btn-primary">Go back to shows list</a>
        @else
        <form method="GET" action="{{ route('movies.indexShows') }}">
            <label for="series">Select a series:</label>
            <select name="series" id="series" class="form-control">
                @foreach ($series as $serie)
                <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Show details</button>
        </form>
        @endif
        @endif
    </div>
</body>

</html>