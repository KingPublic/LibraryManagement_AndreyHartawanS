<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Koran</title>
</head>
<body>

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
    </tbody>
</table>


</body>
</html>
