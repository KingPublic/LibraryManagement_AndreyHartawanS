<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah CD</title>
</head>
<body>

    <h1>Tambah CD</h1>
    <form action="{{ route('cd.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="artist">Artis:</label><br>
        <input type="text" id="artist" name="artist" required><br><br>

        <label for="release_date">Tanggal Rilis:</label><br>
        <input type="date" id="release_date" name="release_date" required><br><br>

        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre" required><br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
