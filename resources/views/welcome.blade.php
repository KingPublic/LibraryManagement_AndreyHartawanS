<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ route('buku.index') }}">Tampilkan Buku</a></li>
        <li><a href="{{ route('jurnal.index') }}">Tampilkan Jurnal</a></li>
        <li><a href="{{ route('koran.index') }}">Tampilkan Koran</a></li>
        <li><a href="{{ route('cd.index') }}">Tampilkan CD</a></li>
        <li><a href="{{ route('skripsi.index') }}">Tampilkan Skripsi</a></li>
    </ul>
</nav>
</body>
</html>

