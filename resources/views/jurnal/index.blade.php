<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurnal</title>
</head>
<body>
@extends('layouts.navbar')

@section('content')
    <h1>Data Jurnal</h1>

    <!-- Sorting Link untuk Judul -->
    <a href="{{ route('jurnal.index', ['sort_by' => 'title', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Judul ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Penulis -->
    <a href="{{ route('jurnal.index', ['sort_by' => 'author', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Penulis ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Penerbit -->
    <a href="{{ route('jurnal.index', ['sort_by' => 'publisher', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Penerbit ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Tahun Terbit -->
    <a href="{{ route('jurnal.index', ['sort_by' => 'publication_year', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Tahun Terbit ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <ul>
        @foreach ($jurnal as $item)
            <li>
                <strong>Judul:</strong> {{ $item->title }}<br>
                <strong>Penulis:</strong> {{ $item->author }}<br>
                <strong>Penerbit:</strong> {{ $item->publisher }}<br>
                <strong>Tahun Terbit:</strong> {{ $item->publication_year }}<br>
                <strong>Deskripsi:</strong> {{ $item->description }}<br><br>
            </li>
        @endforeach
    </ul>
@endsection
</body>
</html>
