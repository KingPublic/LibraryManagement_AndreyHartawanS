<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurnal</title>
</head>
<body>
Copy<h1>Tambah Jurnal</h1>
<form action="{{ route('jurnal.store') }}" method="POST">
    @csrf
    <label for="title">Judul:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="author">Penulis:</label><br>
    <input type="text" id="author" name="author" required><br><br>

    <label for="publisher">Penerbit:</label><br>
    <input type="text" id="publisher" name="publisher" required><br><br>

    <label for="publication_year">Tahun Terbit:</label><br>
    <input type="number" id="publication_year" name="publication_year" required><br><br>

    <label for="description">Deskripsi:</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <button type="submit">Simpan</button>
</form>