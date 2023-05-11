<nav>
    <ul>
        <li><a href="{{ route('movies.indexMovies') }}">Películas</a></li>
        <li><a href="{{ route('movies.indexShows') }}">Series</a></li>
    </ul>
</nav>
@if (isset($serie))
    <h1>{{ $serie['name'] }}</h1>
    <p>{{ $serie['overview'] }}</p>
    <a href="{{ route('movies.indexShows') }}">Volver a la lista de series</a>
@else
    <h1>Series</h1>
    <form method="GET" action="{{ route('movies.indexShows') }}">
        <label for="series">Selecciona una serie:</label>
        <select name="series" id="series">
            @foreach ($series as $serie)
                <option value="{{ $serie['id'] }}">{{ $serie['name'] }}</option>
            @endforeach
        </select>
        <button type="submit">Ver detalles</button>
    </form>
@endif