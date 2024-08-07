<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Movie</title>
</head>

<body>
    <h1>Add New Movie</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <button type="submit">Add Movie</button>
        </div>
    </form>

    <a href="{{ route('movies.index') }}">Back to Movie List</a>
</body>

</html>
