<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        a,
        button {
            font-family: Arial, sans-serif;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            border-radius: 3px;
            transition: background-color 0.3s;
            cursor: pointer;
            display: inline-flex;
            /* Ensures alignment consistency */
            align-items: center;
            /* Vertically centers text within buttons */
            justify-content: center;
            /* Centers text horizontally */
            box-sizing: border-box;
            /* Ensures padding and border are included in element's total width and height */
        }

        a.button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            font-size: 0.9em;
            text-align: center;
        }

        a.button:hover {
            background-color: #2980b9;
        }

        button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 15px;
            border: none;
            font-size: 0.9em;
            text-align: center;
        }

        button:hover {
            background-color: #c0392b;
        }

        p {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form {
            margin: 0;
            /* Remove default margin */
        }
    </style>
</head>

<body>
    <h1>Movie List</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="button">Add New Movie</a>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <ul>
            @foreach ($movies as $movie)
                <li>
                    <b> {{ $movie->name }} </b>
                    <div class="actions">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="button">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this movie?');">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
