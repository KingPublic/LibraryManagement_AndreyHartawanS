<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Manage Library</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Library Inventory</h5>
        </div>
        <div class="card-body">
            <p>Manage the books, CDs, journals, newspapers, and theses here.</p>

            <!-- Book Inventory -->
            <h4>Books</h4>
            <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>publication_year</th>
                        <th>Pages</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{$book->publication_year}}</td>
                            <td>{{$book->pages}}</td>
                            <td>
                                <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('buku.delete', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>CDs</h4>
            <a href="{{ route('cd.create') }}" class="btn btn-primary mb-3">Tambah CD</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Release Date</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cds as $cd)
                        <tr>
                            <td>{{ $cd->id }}</td>
                            <td>{{ $cd->title }}</td>
                            <td>{{ $cd->artist }}</td>
                            <td>{{ $cd->release_date }}</td>
                            <td>{{ $cd->genre }}</td>
                            <td>
                                <a href="{{ route('cd.edit', $cd->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('cd.delete', $cd->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Jurnal Inventory -->
            <h4>Jurnals</h4>
            <a href="{{ route('jurnal.create') }}" class="btn btn-primary mb-3">Tambah Jurnal</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Publication Year</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journals as $jurnal)
                        <tr>
                            <td>{{ $jurnal->id }}</td>
                            <td>{{ $jurnal->title }}</td>
                            <td>{{ $jurnal->author }}</td>
                            <td>{{ $jurnal->publisher }}</td>
                            <td>{{ $jurnal->publication_year }}</td>
                            <td>{{ $jurnal->description }}</td>
                            <td>
                                <a href="{{ route('jurnal.edit', $jurnal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jurnal.delete', $jurnal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Koran Inventory -->
            <h4>Koran</h4>
            <a href="{{ route('koran.create') }}" class="btn btn-primary mb-3">Tambah Koran</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Publication Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($korans) && count($korans) > 0)
                        @foreach ($korans as $koran)
                        <tr>
                            <td>{{ $koran->id }}</td>
                            <td>{{ $koran->title }}</td>
                            <td>{{ $koran->publisher }}</td>
                            <td>{{ $koran->publication_date }}</td>
                            <td>{{ $koran->description }}</td>
                            <td>
                                <a href="{{ route('koran.edit', $koran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('koran.delete', $koran->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No koran records found.</td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
            
            

            <!-- disinii a -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
