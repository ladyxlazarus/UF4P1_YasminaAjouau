<!DOCTYPE html>
<html>

<head>
    <title>MARVEL API - Comic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('marvel.comics') }}" class="btn btn-primary">Go Back</a>
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <h1>Comic</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $comic['title'] }}</h5>
                <p class="card-text">{{ $comic['description'] }}</p>
                <p class="card-text">Issue Number: {{ $comic['issueNumber'] }}</p>
                <p class="card-text">Page Count: {{ $comic['pageCount'] }}</p>
                <p class="card-text">Price: ${{ $comic['prices'][0]['price'] }}</p>
                <p class="card-text">Creators:</p>
                <ul>
                    @foreach ($comic['creators']['items'] as $creator)
                    <li>{{ $creator['name'] }} ({{ $creator['role'] }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>