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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="{{ route('marvel.characters') }}" class="btn btn-primary">Characters</a>
                <a href="{{ route('marvel.comics') }}" class="btn btn-primary">Comics</a>
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
                        <th>Appearances</th>
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