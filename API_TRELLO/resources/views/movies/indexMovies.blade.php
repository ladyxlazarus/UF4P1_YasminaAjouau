<nav>
    <ul>
        <li><a href="{{ route('movies.indexMovies') }}">Películas</a></li>
        <li><a href="{{ route('movies.indexShows') }}">Series</a></li>
    </ul>
</nav>
@if (isset($movie))
    <h1>{{ $movie['title'] }}</h1>
    <p>{{ $movie['overview'] }}</p>
    <a href="{{ route('movies.indexMovies') }}">Volver a la lista de películas</a>
@else
    <h1>Películas</h1>
    <form method="GET" action="{{ route('movies.indexMovies') }}">
        <label for="movie">Selecciona una película:</label>
        <select name="movie" id="movie">
            @foreach ($movies as $movie)
                <option value="{{ $movie['id'] }}">{{ $movie['title'] }}</option>
            @endforeach
        </select>
        <button type="submit">Ver detalles</button>
    </form>
@endif