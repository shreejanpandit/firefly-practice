<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
</head>

<body>
    <h1>Update New Movie</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $movie->name) }}" required>
        </div>

        <div>
            <button type="submit">Update Movie</button>
        </div>
    </form>

    <a href="{{ route('movies.index') }}">Back to Movie List</a>
</body>

</html>
