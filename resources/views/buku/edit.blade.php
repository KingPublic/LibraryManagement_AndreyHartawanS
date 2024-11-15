<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>

    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" value="{{ $buku->title }}" required><br><br>

        <label for="author">Penulis:</label><br>
        <input type="text" id="author" name="author" value="{{ $buku->author }}" required><br><br>

        <label for="publisher">Penerbit:</label><br>
        <input type="text" id="publisher" name="publisher" value="{{ $buku->publisher }}" required><br><br>

        <label for="publication_year">Tahun Terbit:</label><br>
        <input type="number" id="publication_year" name="publication_year" value="{{ $buku->publication_year }}" required><br><br>

        <label for="pages">Jumlah Halaman:</label><br>
        <input type="number" id="pages" name="pages" value="{{ $buku->pages }}" required><br><br>

        <button type="submit"><a href="{{ route('librarian.dashboard') }}"></a>Simpan</button>
    </form>

</body>
</html>
