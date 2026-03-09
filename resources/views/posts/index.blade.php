<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    @foreach ($posts as $post)
        <h2>{{ $post->judul }}</h2>
        <p>{{ $post->isi }}</p>
    @endforeach
</body>
</html>