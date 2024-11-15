<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data CD</title>
</head>
<body>
@extends('layouts.navbar')

@section('content')
    <h1>Data CD</h1>

    <!-- Sorting Link untuk Judul -->
    <a href="{{ route('cd.index', ['sort_by' => 'title', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Judul ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Artis -->
    <a href="{{ route('cd.index', ['sort_by' => 'artist', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Artis ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Tanggal Rilis -->
    <a href="{{ route('cd.index', ['sort_by' => 'release_date', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Tanggal Rilis ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>
    <!-- Sorting Link untuk Tanggal Rilis -->
    <a href="{{ route('cd.index', ['sort_by' => 'genre', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Genre ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>

    <ul>
        @foreach ($cd as $item)
            <li>
                <strong>Judul:</strong> {{ $item->title }}<br>
                <strong>Artis:</strong> {{ $item->artist }}<br>
                <strong>Tanggal Rilis:</strong> {{ $item->release_date }}<br>
                <strong>Genre:</strong> {{ $item->genre }}<br><br>
            </li>
        @endforeach
    </ul>
@endsection
</body>
</html>
