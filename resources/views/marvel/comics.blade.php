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
        <h1>Comics</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic['title'] }}</td>
                        <td>{{ $comic['description'] }}</td>
                        <td><a href="{{ route('marvel.comic', ['id' => $comic['id']]) }}">View details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>