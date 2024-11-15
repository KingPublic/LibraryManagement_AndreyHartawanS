<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>



    <h1>Tambah Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Penulis:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <label for="publisher">Penerbit:</label><br>
        <input type="text" id="publisher" name="publisher" required><br><br>

        <label for="publication_year">Tahun Terbit:</label><br>
        <input type="number" id="publication_year" name="publication_year" required><br><br>

        <label for="pages">Jumlah Halaman:</label><br>
        <input type="number" id="pages" name="pages" required><br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
