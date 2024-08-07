<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
</head>

<body>
    <h1>Movie List</h1>

    <a href="{{ route('movies.create') }}">Add New Movie</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <ul>
        @foreach ($movies as $movie)
            <li>
                <b> {{ $movie->name }} </b>
                <a href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this movie?');">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>
