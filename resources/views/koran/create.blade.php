<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Koran</title>
</head>
<body>

    <h1>Tambah Koran</h1>
    <form action="{{ route('koran.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="publisher">Penerbit:</label><br>
        <input type="text" id="publisher" name="publisher" required><br><br>

        <label for="publication_date">Tanggal Terbit:</label><br>
        <input type="date" id="publication_date" name="publication_date" required><br><br>

        <label for="description">Deskripsi:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>