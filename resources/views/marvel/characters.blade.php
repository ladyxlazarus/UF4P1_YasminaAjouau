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
                    <a href="{{ route('selectCharactersOrComics') }}" class="btn btn-primary">GO BACK TO MARVEL API MENU</a>
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Characters</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                    <tr>
                        <td>{{ $character->name }}</td>
                        <td>{{ $character->description }}</td>
                        <td><a href="{{ route('marvel.character', ['id' => $character->id]) }}">View comics</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>