<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CD</title>
</head>
<body>

    <h1>Edit CD</h1>
    <form action="{{ route('cd.update', $cd->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" value="{{ $cd->title }}" required><br><br>

        <label for="artist">Artis:</label><br>
        <input type="text" id="artist" name="artist" value="{{ $cd->artist }}" required><br><br>

        <label for="release_date">Tanggal Rilis:</label><br>
        <input type="date" id="release_date" name="release_date" value="{{ $cd->release_date }}" required><br><br>

        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre" value="{{ $cd->genre }}" required><br><br>

        <button type="submit"><a href="{{ route('librarian.dashboard') }}"></a>Simpan</button>
    </form>

</body>
</html>
