<!DOCTYPE html>
<html>

<head>
    <title>MARVEL API - Character</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('marvel.characters') }}" class="btn btn-primary">Go Back</a>
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <h1>List of {{ $character->name }}'s comics</h1>
        <p>{{ $character->description }}</p>
        <ul class="list-group">
            @foreach ($character->comics->items as $comic)
            <li class="list-group-item">{{ $comic->name }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>