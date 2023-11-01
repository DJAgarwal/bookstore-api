<!DOCTYPE html>
<html>
<head>
    <title>Book Email</title>
</head>
<body>
    <h1>Book Details</h1>
    <table>
        <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($bookData as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
            </tr>
        @endforeach
        </tbody>
</body>
</html>
