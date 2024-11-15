<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skripsi</title>
</head>
<body>
@extends('layouts.navbar')

@section('content')
    <h1>Data Skripsi</h1>

    <!-- Sorting Link untuk Judul -->
    <a href="{{ route('skripsi.index', ['sort_by' => 'title', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Judul ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Penulis -->
    <a href="{{ route('skripsi.index', ['sort_by' => 'author', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Penulis ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

    <!-- Sorting Link untuk Tahun Pengajuan -->
    <a href="{{ route('skripsi.index', ['sort_by' => 'submit_year', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Tahun Pengajuan ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

   
    <a href="{{ route('skripsi.index', ['sort_by' => 'field_of_study', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Bidang Studi ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>
    <br>

     <!-- Sorting Link untuk Tahun Pengajuan -->
     <a href="{{ route('skripsi.index', ['sort_by' => 'supervisor', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
        Urutkan berdasarkan Dosen Pembimbing ({{ $order == 'asc' ? 'Menurun' : 'Menaik' }})
    </a>

    <ul>
        @foreach ($skripsi as $item)
            <li>
                <strong>Judul:</strong> {{ $item->title }}<br>
                <strong>Penulis:</strong> {{ $item->author }}<br>
                <strong>Tahun Pengajuan:</strong> {{ $item->submit_year }}<br>
                <strong>Bidang Studi:</strong> {{ $item->field_of_study }}<br>
                <strong>Dosen Pembimbing:</strong> {{ $item->supervisor }}<br><br>
            </li>
        @endforeach
    </ul>
@endsection
</body>
</html>
